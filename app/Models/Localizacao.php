<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localizacao extends Model
{
    /** @use HasFactory<\Database\Factories\LocalizacaoFactory> */
    protected $fillable = ["city", "state", "country", "shelf", "bookcase", "room", "site"];
    use HasFactory;
}
