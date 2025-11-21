<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtype extends Model
{
    /** @use HasFactory<\Database\Factories\SubTypeFactory> */
    use HasFactory;
    
    protected $fillable = [
        'name',
        'materials_id',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
