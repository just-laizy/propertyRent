<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        Review::create([
            'user_id' => User::first()->id,
            'property_id' => Property::first()->id,
            'review' => 'Great place to stay!',
            'rating' => 5,
        ]);
    }
}

