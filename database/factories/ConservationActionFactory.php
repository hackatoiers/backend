<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ConservationAction;

class ConservationActionFactory extends Factory
{
    protected $model = ConservationAction::class;

    public function definition(): array
    {
        return [
            'action_date' => $this->faker->dateTimeThisDecade,
            'description' => $this->faker->paragraph,
        ];
    }
}
