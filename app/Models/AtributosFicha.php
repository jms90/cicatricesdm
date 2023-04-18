<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AtributosFicha extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "atributos_paraficha";

}
