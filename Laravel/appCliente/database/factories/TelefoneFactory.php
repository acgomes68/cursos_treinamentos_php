<?php

use Faker\Generator as Faker;

$factory->define(App\Telefone::class, function (Faker $faker) {
    return [
        'titulo' => $faker->name,
        'numero' => $faker->phoneNumber
    ];
});
