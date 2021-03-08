<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Despacho;
use Faker\Generator as Faker;

$factory->define(Despacho::class, function (Faker $faker) {

    return [
        'doc_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'file' => $faker->word,
        'destino' => $faker->word,
        'obs' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
