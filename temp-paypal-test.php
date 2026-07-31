<?php
require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$d = new App\Models\Donation();
$d->uuid = 'test-uuid';
$d->amount_usd = 25;
$d->platform_fee_usd = 1.88;
$d->frequency = 'once';
$d->payment_method = 'paypal';
$d->donor_type = 'individual';
$d->first_name = 'Test';
$d->last_name = 'User';
$d->email = 'test@example.com';
$d->address1 = '123 Main';
$d->city = 'Manila';
$d->postcode = '1000';
$d->state = 'Metro Manila';
$d->country = 'PH';

$service = new App\Services\PayPalDonationService();

try {
    $response = $service->createOrder($d);
    var_dump($response);
} catch (Throwable $e) {
    echo get_class($e) . PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
    echo $e->getTraceAsString() . PHP_EOL;
}

$client = new Srmklive\PayPal\Services\PayPal();
$client->setApiCredentials(config('paypal'));
$client->getAccessToken();
$data = [
    'intent' => 'CAPTURE',
    'purchase_units' => [[
        'reference_id' => 'test-uuid',
        'description' => 'OneGoBike Donation',
        'amount' => [
            'currency_code' => 'USD',
            'value' => '26.88',
        ],
    ]],
    'application_context' => [
        'return_url' => 'http://onegobike.test/donate/success/test-uuid',
        'cancel_url' => 'http://onegobike.test/donate/cancel/test-uuid',
        'brand_name' => 'OneGoBike',
        'user_action' => 'PAY_NOW',
    ],
];

$response = $client->createOrder($data);
var_dump($response);
