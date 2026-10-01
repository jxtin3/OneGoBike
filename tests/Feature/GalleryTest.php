<?php
use App\Models\Picture;
//gallery
it('shows the gallery page', function () {
    $response = $this->get('/gallery');

    $response->assertStatus(200)
        ->assertSee('Gallery Showcase');
});

//empty gallery
it('shows the empty gallery message when there are no photos', function () {
    $response = $this->get('/gallery');

    $response->assertStatus(200)
        ->assertSee('No photos in the gallery yet. Check back soon for new field uploads.');
});

// gallery picture
it('shows a gallery picture', function () {
    Picture::create([
        'title' => 'Community Activity',
        'description' => 'A test gallery picture.',
        'image_path' => 'gallery/test-picture.jpg',
        'uploaded_by' => null,
    ]);

    $response = $this->get('/gallery');

    $response->assertStatus(200)
        ->assertSee('Community Activity')
        ->assertSee('A test gallery picture.');
});