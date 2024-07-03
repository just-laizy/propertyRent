<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\PropertyAmenity;
use App\Models\Amenity;
use Illuminate\Database\Seeder;

class PropertyAmenitySeeder extends Seeder
{
    public function run()
    {
        $property = Property::first();
        $amenities = Amenity::all();

        foreach ($amenities as $amenity) {
            PropertyAmenity::create([
                'property_id' => $property->id,
                'amenity_id' => $amenity->id,
            ]);
        }
    }
}

