<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colecao extends Model
{
    /** @use HasFactory<\Database\Factories\ColecaoFactory> */
    use HasFactory;
    protected $fillable = ["nome", "dono", "descricao"];

}
