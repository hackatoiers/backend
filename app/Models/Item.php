<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\IntegrityEnum;
use App\ConservationStateEnum;

class Item extends Model
{
    /** @use HasFactory<\Database\Factories\ItemFactory> */
    use HasFactory;
    protected $fillable = [
        "name",
        "number",
        'description',
        'dimentions',
        "description",
        "conservation_state",
        "integrity",
        "colection_id",
        "location_id",
        "subtype_id",
        'weight',
        'technic',
        'conservation_detail',
        'reference',
        'date_cadastred',

    ];
    protected $casts = [
        'conservation_state' => ConservationStateEnum::class,
        'integrity' => IntegrityEnum::class,
    ];
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}

