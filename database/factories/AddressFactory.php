<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Address::class, function (Faker $faker) {
    return [
        'description' => str_replace( "\n", ' ', $faker->address),
        'confirmed' => $faker->boolean,
    ];
});
