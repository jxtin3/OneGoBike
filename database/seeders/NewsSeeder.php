<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $news = [
            [
                'title' => 'Youth Responders Complete Basic Life Support Training',
                'slug' => Str::slug('Youth Responders Complete Basic Life Support Training'),
                'excerpt' => 'Over 50 youth volunteers from Dagupan successfully completed their BLS certification, strengthening our community resilience.',
                'body' => 'Full article content here...',
                'image_path' => 'images/story-1.jpg',
                'category' => 'Training',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'New Bicycles Deployed for Remote Barangay Missions',
                'slug' => Str::slug('New Bicycles Deployed for Remote Barangay Missions'),
                'excerpt' => 'Thanks to recent donations, we have deployed 20 new bicycles to reach more remote areas during our health missions.',
                'body' => 'Full article content here...',
                'image_path' => 'images/impact-story.jpg',
                'category' => 'Operations',
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Upcoming Medical Mission in Lingayen',
                'slug' => Str::slug('Upcoming Medical Mission in Lingayen'),
                'excerpt' => 'Join us next weekend as we partner with the local government for a comprehensive medical and health outreach program.',
                'body' => 'Full article content here...',
                'image_path' => 'images/home1.jpg',
                'category' => 'Events',
                'is_published' => true,
                'published_at' => now()->subDays(10),
            ],
        ];

        foreach ($news as $item) {
            \App\Models\News::create($item);
        }
    }
}
