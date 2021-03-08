<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Doc;
use Faker\Generator as Faker;

$factory->define(Doc::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'nrDoc' => $faker->word,
        'proveniencia' => $faker->word,
        'destino' => $faker->word,
        'assunto' => $faker->word,
        'descricao' => $faker->word,
        'estado' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
