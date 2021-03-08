<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pessoa;
use Faker\Generator as Faker;

$factory->define(Pessoa::class, function (Faker $faker) {

    return [
        'nome' => $faker->word,
        'nrDoc' => $faker->word,
        'endereco' => $faker->word,
        'telefone' => $faker->word,
        'file' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
