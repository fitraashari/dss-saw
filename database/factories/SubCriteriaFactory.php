<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Criteria;
use App\SubCriteria;
use Faker\Generator as Faker;

$factory->define(SubCriteria::class, function (Faker $faker) {
    return [
        'criteria_id' => Criteria::all()->random()->id,
        'name' => $faker->name(),
        'weight' => $faker->randomDigit,
    ];
});
