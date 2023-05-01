<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AtributoPj extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "avances_personajes";
    protected $fillable = [
        'personaje_id',
        'atributo_id',
        'nivel',
        'cantidad_nivel',
    ];
}
