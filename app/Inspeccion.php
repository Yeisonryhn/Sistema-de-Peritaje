<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inspeccion extends Model
{
    protected $fillable = ['placa','marca','modelo','anio','estado','fecha'];

    public function propietario()
    {
        return $this->belongsTo(Propietario::class);
    }
}
