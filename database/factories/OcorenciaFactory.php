<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Ocorencia;
use Faker\Generator as Faker;

$factory->define(Ocorencia::class, function (Faker $faker) {

    return [
        'nr-ocorencia' => $faker->randomDigitNotNull,
        'descricao' => $faker->word,
        'imagem' => $faker->word,
        'user_id' => $faker->randomDigitNotNull,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
