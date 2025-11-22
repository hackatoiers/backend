<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as UseAuditable;

class Location extends Model implements Auditable
{
    /** @use HasFactory<\Database\Factories\LocationFactory> */
    use HasFactory, UseAuditable;

    protected $table = 'locations';
    protected $auditInclude = [
        'city',
        'state',
        'country',

        'room',
        'shelf',
        'bookcase',
    ];
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
        return $this->hasOne(Item::class);
    }
}
