<?php

namespace Database\Factories;

use App\Models\PropertyAmenity;
use App\Models\Property;
use App\Models\Amenity;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyAmenityFactory extends Factory
{
    protected $model = PropertyAmenity::class;

    public function definition()
    {
        return [
            'property_id' => Property::factory(),
            'amenity_id' => Amenity::factory(),
        ];
    }
}
