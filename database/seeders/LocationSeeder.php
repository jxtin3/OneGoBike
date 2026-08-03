<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'name' => 'Juan Dela Cruz',
                'role' => 'Volunteer',
                'latitude' => 16.0435,
                'longitude' => 120.3334,
                'status' => 'Active',
            ],
            [
                'name' => 'Mina Santos',
                'role' => 'Community Member',
                'latitude' => 16.0510,
                'longitude' => 120.3440,
                'status' => 'Active',
            ],
            [
                'name' => 'Emergency Team 1',
                'role' => 'Emergency Request',
                'latitude' => 16.0388,
                'longitude' => 120.3201,
                'status' => 'Responding',
            ],
            [
                'name' => 'Rico Garcia',
                'role' => 'Volunteer',
                'latitude' => 16.0592,
                'longitude' => 120.3555,
                'status' => 'Offline',
            ],
        ];

        foreach ($locations as $location) {
            Location::firstOrCreate(
                ['name' => $location['name']],
                $location
            );
        }
    }
}
