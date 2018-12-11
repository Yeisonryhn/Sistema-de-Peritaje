<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    
    protected $fillable = ['cedula'.'nombre','direccion','telefono','email'];

}
