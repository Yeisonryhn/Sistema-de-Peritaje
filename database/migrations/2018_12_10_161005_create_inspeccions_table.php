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
            $table->string('placa')->unique()->nullable($value=false);
            $table->string('marca')->nullable($value=false);
            $table->string('modelo')->nullable($value=false);
            $table->integer('anio')->nullable($value=false);
            $table->string('estado_carro',200)->nullable($value=false);
            $table->date('fecha')->nullable($value=false);
            $table->integer('propietario_cedula')->references('cedula')->on('propietarios')->nullable($value=false);
            $table->integer('propietario_id')->references('id')->on('propietarios')->nullable($value=false);
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
