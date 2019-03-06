<?php

use Faker\Generator as Faker;

$factory->define(App\Cliente::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->safeEmail,
        'endereco' => $faker->streetAddress
    ];
});
