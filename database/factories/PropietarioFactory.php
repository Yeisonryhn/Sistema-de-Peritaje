<?php

use Faker\Generator as Faker;

$factory->define(\App\Propietario::class, function (Faker $faker) {
    $ced = rand(1,40999999);
    $cell = rand(1000000,9000000);
    return [
        'cedula' => (string)$ced,
        'nombre' => $faker->name,
        'direccion' => $faker->sentence(5,false),
        'telefono' => '0414'.$cell,
        'email' =>$faker->unique()->safeEmail
    ];
});
