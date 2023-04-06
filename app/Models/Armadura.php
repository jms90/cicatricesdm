<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Armadura extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "armaduras";

    public function propiedades()
    {
        return $this->belongsToMany(Propiedad::class, "armaduras_propiedades");
    }

    public function lugaresCuerpo()
    {
        return $this->belongsToMany(LugarCuerpo::class, "armaduras_lugares_cuerpo", "armadura_id", "lugar_id");
    }
}
