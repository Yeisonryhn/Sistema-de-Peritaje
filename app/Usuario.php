<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['login','clave'];
    protected $hidden = ['clave'];
    protected $cast = ['es_admin'=>'boolean'];

    public function administrador()//Devuelve si es administrador
    {
        return $this->es_admin;
    }
}
