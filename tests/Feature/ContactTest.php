<?php
use App\Models\ContactMessage;

// contact page
it('contact page',
function () {
        $response = $this->get('/contact');
        $response->assertStatus(200);
});


// store message test
it('stores a valid contact message', function () {
    $response = $this->postJson('/contact', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'subject' => 'Test Subject',
        'otherConcern' => 'Test Concern',
        'phone' => '09123456789',
        'message' => 'This is a test contact message.',
    ]);

    $response->assertStatus(200)
        ->assertJson([
            'message' => 'Message sent.',
        ]);

    $this->assertDatabaseHas('contact_messages', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'subject' => 'Test Subject',
        'other_concern' => 'Test Concern',
        'phone' => '09123456789',
        'message' => 'This is a test contact message.',
    ]);
});


// 
it('rejects a contact message without required fields', function () {
    $response = $this->postJson('/contact', []);

    $response->assertStatus(422);

    $errors = $response->json('errors');

    expect($errors)->toHaveKeys([
        'name',
        'email',
        'message',
    ]);
});