<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as UseAuditable;

class Reserve extends Model implements Auditable
{
    /** @use HasFactory<\Database\Factories\ReserveFactory> */
    use HasFactory, UseAuditable;

    protected $table = 'reserve';

    protected $fillable = [
        'user_email',
        'item_id',
        'reserved_at',
        'deadline_at',
    ];

    protected $auditInclude = [
        'user_email',
        'item_id',
        'reserved_at',
        'deadline_at',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
