<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inspeccion extends Model
{
    protected $fillable = ['placa','marca','modelo','anio','estado_carro','fecha','propietario_cedula','propietario_id'];

    public function propietario()
    {
        return $this->belongsTo(Propietario::class);
    }
}
