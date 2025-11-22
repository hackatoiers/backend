<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Material extends Model implements Auditable
{
    /** @use HasFactory<\Database\Factories\MaterialFactory> */
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'materials';

    protected $auditInclude = [
        'name',
    ];

    protected $fillable = [
        'name',
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
