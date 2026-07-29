<?php

namespace App\Http\Controllers\Webhook;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Services\PayMongoDonationService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PayMongoWebhookController extends Controller
{
    public function handle(Request $request, PayMongoDonationService $paymongo): Response
    {
        $rawBody = $request->getContent();
        $signature = $request->header('Paymongo-Signature', '');

        if (! $paymongo->verifyWebhookSignature($rawBody, $signature)) {
            return response('Invalid signature', 400);
        }

        $payload = $request->json()->all();
        $eventType = $payload['data']['attributes']['type'] ?? '';

        if ($eventType === 'checkout_session.payment.paid') {
            $attributes = $payload['data']['attributes']['data']['attributes'] ?? [];
            $metadata = $attributes['metadata'] ?? [];
            $uuid = $metadata['donation_uuid'] ?? null;
            $referenceNumber = $attributes['reference_number'] ?? null;
            $paymentId = $attributes['payments'][0]['id'] ?? null;

            $donation = null;

            if ($uuid) {
                $donation = Donation::where('uuid', $uuid)->first();
            } elseif ($referenceNumber) {
                $donation = Donation::where('uuid', $referenceNumber)->first();
            }

            if ($donation && $donation->status !== 'paid') {
                $donation->markPaid($paymentId);
            }
        }

        return response('OK', 200);
    }
}
