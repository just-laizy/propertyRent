<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Property;
use App\Models\Booking;
use App\Models\Review;
use App\Models\Amenity;
use App\Models\PropertyAmenity;
use App\Models\Message;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory(10)->create();
        Property::factory(20)->create();
        Booking::factory(30)->create();
        Review::factory(50)->create();
        Amenity::factory(10)->create()->each(function ($amenity) {
            PropertyAmenity::factory(5)->create(['amenity_id' => $amenity->id]);
        });
        Message::factory(40)->create();
    }
}
