<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Photo;
use App\Models\Item;

class PhotoFactory extends Factory
{
    protected $model = Photo::class;

    public function definition(): array
    {
        return [
            'photo_url' => $this->faker->imageUrl(640, 480, 'archaeology', true),
            'item_id' => Item::factory(),
        ];
    }
}
