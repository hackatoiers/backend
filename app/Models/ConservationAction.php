<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConservationAction extends Model
{
    /** @use HasFactory<\Database\Factories\ConservationActionFactory> */
    use HasFactory;

    protected $table = 'conservation_actions';

    protected $fillable = [
        'action_date',
        'description',
    ];

    protected $auditInclude = [
        'action_date',
        'description',
    ];
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
