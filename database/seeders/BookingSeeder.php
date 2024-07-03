<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run()
    {
        Booking::create([
            'user_id' => User::first()->id,
            'property_id' => Property::first()->id,
            'start_date' => '2024-07-01',
            'end_date' => '2024-07-10',
            'total_price' => 1500.00,
        ]);
    }
}

