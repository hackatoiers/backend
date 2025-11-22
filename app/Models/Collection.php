<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    /** @use HasFactory<\Database\Factories\CollectionFactory> */
    use HasFactory;

    protected $table = 'collections';

    protected $fillable = ['name', 'owner', 'description'];

    protected $auditInclude = [
        'name', 'owner', 'description',
    ];
}
