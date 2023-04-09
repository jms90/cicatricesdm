<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AtributoClase extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "atributos_clases";
    protected $fillable = [
        'clase_id',
        'atributo_id',
        'nivel',
        'cantidad_nivel',
    ];
}
