<?php

use App\Models\donation;

it('donation success page', function () {

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
        'status' => 'paid',

    ]);
    $response = $this->get("/donate/success/{$donation->uuid}");
    $response->assertStatus(200);

});