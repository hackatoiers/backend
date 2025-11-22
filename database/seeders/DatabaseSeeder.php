<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\SubType;
use App\Models\Collection;
use App\Models\EthnicGroup;
use App\Models\Location;
use App\Models\Item;
use App\Models\Photo;
use App\Models\ConservationAction;
use App\Models\Reserve;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Material::factory(10)->create()->each(function ($material) {
            SubType::factory(10)->create(['materials_id' => $material->id]);
        });

        Collection::factory(10)->create();
        EthnicGroup::factory(10)->create();
        Location::factory(10)->create();

        Item::factory(10)->create()->each(function ($item) {
            Photo::factory(5)->create(['item_id' => $item->id]);
            Reserve::factory(2)->create(['item_id' => $item->id]);
        });

        ConservationAction::factory(10)->create();
    }
}
