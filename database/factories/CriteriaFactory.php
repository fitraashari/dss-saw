<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Criteria;
use Faker\Generator as Faker;

$factory->define(Criteria::class, function (Faker $faker) {
    return [
        'criteria_code' => $faker->unique()->randomDigit,
        'name' => $faker->word(),
        'type' => 'Benefit',
        'weight' => $faker->randomDigit,
    ];
});
