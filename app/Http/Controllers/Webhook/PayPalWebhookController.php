<?php

namespace App\Http\Controllers\Webhook;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Services\PayPalDonationService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PayPalWebhookController extends Controller
{
    public function handle(Request $request, PayPalDonationService $paypal): Response
    {
        $rawBody = $request->getContent();
        $headers = collect($request->headers->all())
            ->map(fn ($values) => $values[0] ?? '')
            ->all();

        if (! $paypal->verifyWebhookLocally($headers, $rawBody)) {
            return response('Invalid signature', 400);
        }

        $payload = $request->json()->all();
        $eventType = $payload['event_type'] ?? '';

        if ($eventType === 'CHECKOUT.ORDER.APPROVED' || $eventType === 'PAYMENT.CAPTURE.COMPLETED') {
            $resource = $payload['resource'] ?? [];
            $referenceId = $resource['purchase_units'][0]['reference_id'] ?? null;
            $orderId = $resource['id'] ?? null;

            $donation = null;

            if ($referenceId) {
                $donation = Donation::where('uuid', $referenceId)->first();
            }

            if (! $donation && $orderId) {
                $donation = Donation::where('paypal_order_id', $orderId)->first();
            }

            if ($donation && $donation->status !== 'paid') {
                $donation->update(['status' => 'paid']);
            }
        }

        return response('OK', 200);
    }
}
