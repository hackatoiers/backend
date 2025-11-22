<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Item;
use App\Models\Location;
use App\Models\SubType;
use App\Models\Collection;
use App\Models\EthnicGroup;
use App\IntegrityEnum;
use App\ConservationStateEnum;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'description' => $this->faker->paragraph,
            'number' => $this->faker->unique()->numerify('ITEM-####'),
            'length' => $this->faker->numberBetween(10, 100),
            'height' => $this->faker->numberBetween(10, 100),
            'width' => $this->faker->numberBetween(10, 100),
            'weight' => $this->faker->numberBetween(1, 50),
            'archeological_site' => $this->faker->city,
            'technic' => $this->faker->word,
            'reference' => $this->faker->word,
            'integrity' => $this->faker->randomElement(array_column(IntegrityEnum::cases(), 'value')),
            'conservation_state' => $this->faker->randomElement(array_column(ConservationStateEnum::cases(), 'value')),
            'conservation_detail' => $this->faker->sentence,
            'location_id' => Location::factory(),
            'subtype_id' => Subtype::factory(),
            'collection_id' => Collection::factory(),
            'ethnic_group_id' => EthnicGroup::factory(),
        ];
    }
}
