<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Destino;
use Faker\Generator as Faker;

$factory->define(Destino::class, function (Faker $faker) {

    return [
        'designacao' => $faker->word,
        'chefe' => $faker->word,
        'email' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
