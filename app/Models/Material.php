<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    /** @use HasFactory<\Database\Factories\MaterialFactory> */
    use HasFactory;

    protected $table = 'materials';

    protected $fillable = [
        'name',
    ];

    public function subtypes()
    {
        return $this->hasMany(Subtipo::class, 'materials_id');
    }

    public function items()
    {
        return $this->hasManyThrough(Item::class, Subtipo::class, 'materials_id', 'subtype_id');
    }
}
