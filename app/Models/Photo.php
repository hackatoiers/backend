<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /** @use HasFactory<\Database\Factories\PhotoFactory> */
    use HasFactory;

    protected $table = "photos";

    protected $fillable = ["photo_url", "item_id"];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
