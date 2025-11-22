<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Reserve;
use App\Models\Item;

class ReserveFactory extends Factory
{
    protected $model = Reserve::class;

    public function definition(): array
    {
        $reservedAt = $this->faker->dateTimeThisYear;
        return [
            'user_email' => $this->faker->unique()->safeEmail,
            'item_id' => Item::factory(),
            'reserved_at' => $reservedAt,
            'deadline_at' => $this->faker->dateTimeBetween($reservedAt, '+1 month'),
        ];
    }
}
