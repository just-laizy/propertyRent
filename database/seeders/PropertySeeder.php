<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run()
    {
        Property::create([
            'user_id' => User::first()->id,
            'title' => 'Beautiful Apartment',
            'description' => 'A beautiful apartment in the city center.',
            'location' => 'City Center',
            'price' => 150.00,
            'availability' => true,
        ]);
    }
}
