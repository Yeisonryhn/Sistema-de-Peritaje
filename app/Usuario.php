<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['login','password'];
    protected $hidden = ['password'];
    protected $cast = ['es_admin'=>'boolean'];

    public function administrador()//Devuelve si es administrador
    {
        return $this->es_admin;
    }

    public function propietario()//Devuelve las inspecciones que tiene el Usuario
    {
        return  $this->belongsTo(Propietario::class);
    }
}
