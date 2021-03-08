<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Estado;
use Faker\Generator as Faker;

$factory->define(Estado::class, function (Faker $faker) {

    return [
        'designacao' => $faker->word,
        'detalhe' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
