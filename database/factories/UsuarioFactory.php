<?php

use Faker\Generator as Faker;

$factory->define(App\Usuario::class, function (Faker $faker) {
    return [
        'login'=>$faker->sentence(1,false),
        'clave'=>'$claveeeee123',
        'nombre'=>$faker->name,
    ];
});
