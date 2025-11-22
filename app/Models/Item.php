<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\IntegrityEnum;
use App\ConservationStateEnum;
use OwenIt\Auditing\Auditable as UseAuditable;

class Item extends Model
{
    /** @use HasFactory<\Database\Factories\ItemFactory> */

    use HasFactory,UseAuditable;
    protected $fillable = [
        'name',
        'description',
        'number',

        'length',
        'height',
        'width',
        'weight',

        'archeological_site',
        'technic',
        'reference',

        'integrity',
        'conservation_state',
        'conservation_detail',

        'location_id',
        'subtype_id',
        'collection_id',
        'ethnic_group_id',
    ];
    protected $auditInclude = [
        'name',
        'description',
        'number',

        'length',
        'height',
        'width',
        'weight',

        'archeological_site',
        'technic',
        'reference',

        'integrity',
        'conservation_state',
        'conservation_detail',

        'location_id',
        'subtype_id',
        'collection_id',
        'ethnic_group_id',
    ];
    protected $casts = [
        'conservation_state' => ConservationStateEnum::class,
        'integrity' => IntegrityEnum::class,
    ];

    public function location()
    {
        return $this->hasOne(Location::class);
    }

    public function subtype()
    {
        return $this->belongsTo(Subtype::class);
    }

    public function material()
    {
        return $this->hasOneThrough(Material::class, Subtype::class, 'id', 'id', 'subtype_id', 'materials_id');
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function ethnicGroup()
    {
        return $this->belongsTo(EthnicGroup::class);
    }

    public function conservationActions()
    {
        return $this->hasMany(ConservationAction::class);
    }
}

