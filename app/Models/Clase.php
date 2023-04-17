<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clase extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "clases";

    public function equipoInicial(){
        return $this->belongsToMany(Petrecho::class, "clases_petrechos", "clase_id", "petrecho_id")->withPivot("cantidad", "descripcion");
    }

}
