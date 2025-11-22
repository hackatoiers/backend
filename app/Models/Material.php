<?php

namespace App\Models;

use App\MaterialEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as UseAuditable;

class Material extends Model implements Auditable
{
    /** @use HasFactory<\Database\Factories\MaterialFactory> */
    use HasFactory, UseAuditable;

    protected $table = 'materials';

    protected $auditInclude = [
        'name',
    ];

    protected $fillable = [
        'name',
    ];
    protected $casts = [
    'material' => MaterialEnum::class
];
    public function subtypes()
    {
        return $this->hasMany(Subtype::class, 'materials_id');
    }

    public function items()
    {
        return $this->hasManyThrough(Item::class, Subtype::class, 'materials_id', 'subtype_id');
    }
}
