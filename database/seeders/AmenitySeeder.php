<?php

namespace Database\Seeders;

use App\Models\Amenity;
use Illuminate\Database\Seeder;

class AmenitySeeder extends Seeder
{
    public function run()
    {
        Amenity::create(['name' => 'WiFi']);
        Amenity::create(['name' => 'Parking']);
        Amenity::create(['name' => 'Pool']);
    }
}

