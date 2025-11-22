<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubType extends Model
{
    /** @use HasFactory<\Database\Factories\SubTypeFactory> */
    use HasFactory;

    protected $table = 'subtypes';

    protected $fillable = [
        'name',
        'materials_id',
    ];

    protected $auditInclude = [
        'name',
        'materials_id',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class, 'materials_id');
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
