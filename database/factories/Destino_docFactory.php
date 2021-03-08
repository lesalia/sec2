<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Destino_doc;
use Faker\Generator as Faker;

$factory->define(Destino_doc::class, function (Faker $faker) {

    return [
        'doc_id' => $faker->randomDigitNotNull,
        'destino_id' => $faker->randomDigitNotNull,
        'observacao' => $faker->word,
        'ficheiro' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
