<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspeccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspeccions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('placa')->unique();
            $table->string('marca');
            $table->string('modelo');
            $table->integer('anio');
            $table->string('estado_carro',200);
            $table->date('fecha');
            $table->integer('propietario_cedula')->references('cedula')->on('propietarios');
            $table->integer('propietario_id')->references('id')->on('propietarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inspeccions');
    }
}
