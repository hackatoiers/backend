<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Location;

class LocationFactory extends Factory
{
    protected $model = Location::class;

    public function definition(): array
    {
        return [
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'room' => $this->faker->bothify('Room ##'),
            'shelf' => $this->faker->bothify('Shelf ##'),
            'bookcase' => $this->faker->bothify('Bookcase ##'),
        ];
    }
}
