<?php

use App\Models\donation;

it('rejects retry for a donation without a paymongo session', function () {

    $donation = Donation::create([
        'uuid' => (string) str()->uuid(),

        'donor_type' => 'individual',
        'first_name' => 'Test',
        'last_name' => 'Donor',
        'email' => 'test@example.com',

        'address1' => '123 Test st.',
        'city' => 'Test City',
        'postcode' => '1000',
        'state' => 'Test State',
        'country' => 'PH',

        'amount_usd' => 25,
        'amount_php' => 1450,
        'platform_fee_usd' => 0,

        'frequency' => 'once',
        'payment_method' => 'paypal',
        'status' => 'pending',

    ]);
    $response = $this->get("/donate/retry/{$donation->uuid}");
    $response->assertRedirect(route('donate'))
        ->assertSessionHas('error');

});