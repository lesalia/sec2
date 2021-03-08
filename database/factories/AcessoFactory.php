<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Acesso;
use Faker\Generator as Faker;

$factory->define(Acesso::class, function (Faker $faker) {

    return [
        'pessoa_id' => $faker->randomDigitNotNull,
        'destino' => $faker->word,
        'assunto' => $faker->word,
        'proveniencia' => $faker->word,
        'entrada' => $faker->word,
        'saida' => $faker->word,
        'horaSaida' => $faker->date('Y-m-d H:i:s'),
        'observacao' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
