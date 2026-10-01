<?php
use App\Models\News;

// news
it('news page',
function () {
        $response = $this->get('/news');
        $response->assertStatus(200);
});
// $response->assertRedirect('if what is route'); -- use this if assertStatus got eeror


// published news
it('shows published news but hides draft news',
function () {
    News::create([
        'title' => 'Published Test News',
        'slug' => 'publlished-test-news',
        'body' => 'This is a published test article',
        'is_published' => true,
        'published_at' => now(),
    ]);
    
    News::create([
        'title' => 'Draft Test News',
        'slug' => 'draft-test-news',
        'body' => 'This is a draft test article',
        'is_published' => false,
        'published_at' => null,
    ]);

    $response = $this->get('/news');

    $response->assertStatus(200)
        ->assertSee('Published Test News')
        ->assertDontSee('Draft Test News');
        
});
