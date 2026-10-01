<?php

it('rejects an incomplete donation checkout', function () {
    $response = $this->post('/donate/checkout', []);

    $response->assertRedirect()
        ->assertSessionHasErrors([
            'amount',
            'frequency',
            'payment_method',
            'donor_type',
            'first_name',
            'last_name',
            'email',
            'address1',
            'city',
            'postcode',
            'state',
            'country',
        ]);
});