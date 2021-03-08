<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Viatura;
use Faker\Generator as Faker;

$factory->define(Viatura::class, function (Faker $faker) {

    return [
        'pessoa_id' => $faker->randomDigitNotNull,
        'tipo' => $faker->word,
        'matricula' => $faker->word,
        'categoria' => $faker->word,
        'nrContentor' => $faker->word,
        'qtdMercadoria' => $faker->word,
        'obs' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
