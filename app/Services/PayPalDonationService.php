<?php

namespace App\Services;
use Illuminate\Support\Facades\Log;
use App\Models\Donation;
use RuntimeException;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalDonationService
{
    private PayPalClient $client;

    public function __construct()
    {
        $this->client = new PayPalClient;
        $this->client->setApiCredentials(config('paypal'));
        $this->client->getAccessToken();
    }

    /**
     * @return array{approval_url: string, order_id: string}
     */
    public function createOrder(Donation $donation): array
    {
        $clientId = config('paypal.'.config('paypal.mode').'.client_id');

        if ($clientId === '') {
            throw new RuntimeException('PayPal is not configured. Add PAYPAL_SANDBOX_CLIENT_ID and PAYPAL_SANDBOX_CLIENT_SECRET to your .env file.');
        }

        $response = $this->client->createOrder([
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'reference_id' => $donation->uuid,
                    'description' => 'OneGoBike Donation',
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => number_format($donation->total_usd, 2, '.', ''),
                    ],
                ],
            ],
            'application_context' => [
                'return_url' => route('donate.success', $donation),
                'cancel_url' => route('donate.cancel', $donation),
                'brand_name' => 'OneGoBike',
                'user_action' => 'PAY_NOW',
            ],
        ]);

        if (($response['status'] ?? '') !== 'CREATED') {
    Log::error('PayPal order creation failed', ['response' => $response]);

    $reason = $response['message']
        ?? $response['error_description']
        ?? ($response['details'][0]['description'] ?? null)
        ?? ($response['name'] ?? null)
        ?? 'Unexpected response from PayPal.';

    throw new RuntimeException("PayPal order creation failed: {$reason}");
}

        $approvalUrl = collect($response['links'] ?? [])
            ->firstWhere('rel', 'approve')['href'] ?? null;

        if ($approvalUrl === null) {
            throw new RuntimeException('PayPal approval URL not found.');
        }

        return [
            'approval_url' => $approvalUrl,
            'order_id' => $response['id'],
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function captureOrder(string $orderId): array
    {
        return $this->client->capturePaymentOrder($orderId);
    }

    public function isCaptureSuccessful(array $response): bool
    {
        return ($response['status'] ?? '') === 'COMPLETED';
    }

    public function verifyWebhookLocally(array $headers, string $rawBody): bool
    {
        $webhookId = (string) env('PAYPAL_WEBHOOK_ID', '');

        if ($webhookId === '') {
            return app()->environment('local', 'testing');
        }

        return $this->client->verifyWebHookLocally($headers, $webhookId, $rawBody);
    }
}
