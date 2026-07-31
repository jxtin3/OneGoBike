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

        if ($eventType === 'PAYMENT.CAPTURE.COMPLETED') {
            $this->markPaidFromCapture($payload);
        } elseif ($eventType === 'CHECKOUT.ORDER.APPROVED') {
            $this->captureAndMarkPaid($payload, $paypal);
        }

        return response('OK', 200);
    }

   
    private function markPaidFromCapture(array $payload): void
    {
        $resource = $payload['resource'] ?? [];
        $orderId = $resource['supplementary_data']['related_ids']['order_id'] ?? null;

        if (! $orderId) {
            return;
        }

        $donation = Donation::where('paypal_order_id', $orderId)->first();

        if ($donation && $donation->status !== 'paid') {
            $donation->update(['status' => 'paid']);
        }
    }

  
    private function captureAndMarkPaid(array $payload, PayPalDonationService $paypal): void
    {
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

        if (! $donation || $donation->status === 'paid' || ! $orderId) {
            return;
        }

        try {
            $capture = $paypal->captureOrder($orderId);
        } catch (\Throwable) {
            return;
        }

        if ($paypal->isCaptureSuccessful($capture)) {
            $donation->update(['status' => 'paid']);
        }
    }
}