<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personaje extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "personajes";

    public function atributos()
    {
        return $this->belongsToMany(AtributosFicha::class, 'personaje_atributo', 'personaje_id', 'atributo_id')->withPivot('valor');
    }

    public function habilidades()
    {
        return $this->belongsToMany(Habilidad::class, 'personaje_habilidad', 'personaje_id', 'habilidad_id')->withPivot('valor');
    }

    public function avances()
    {
        return $this->hasMany(AtributoPj::class, 'personaje_id', 'id');
    }

    public function talentos(){
        return $this->belongsToMany(Talento::class, 'personaje_talento', 'personaje_id', 'talento_id');
    }
}
