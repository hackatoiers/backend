<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /** @use HasFactory<\Database\Factories\LocationFactory> */
    use HasFactory;

    protected $table = 'locations';

    protected $fillable = [
        'city',
        'state',
        'country',

        'room',
        'shelf',
        'bookcase',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
