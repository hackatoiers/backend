<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SubType;
use App\Models\Material;

class SubTypeFactory extends Factory
{
    protected $model = SubType::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'materials_id' => Material::factory(),
        ];
    }
}
