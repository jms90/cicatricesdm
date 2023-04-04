<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Arma extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "armas";

    public function propiedades(){
        return $this->belongsToMany(Propiedad::class, "armas_propiedades");
    }
}
