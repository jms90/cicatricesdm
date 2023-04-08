<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bendicion extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "bendiciones";



    public function alineaciones(){
        return $this->belongsToMany(Dios::class, "bendiciones_dioses");
    }
}
