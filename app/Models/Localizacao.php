<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localizacao extends Model
{
    /** @use HasFactory<\Database\Factories\LocalizacaoFactory> */
    protected $fillable = ["cidade", "estado", "pais", "estante", "prateleira", "sala", "sitio"];
    use HasFactory;
}
