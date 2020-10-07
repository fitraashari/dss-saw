<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employe;
use Faker\Generator as Faker;

$factory->define(Employe::class, function (Faker $faker) {
    return [
        'full_name'=>$faker->name(),
        'gender'=>$faker->randomElement(['Male', 'Female']),
        'birth_place'=>$faker->country(),
        'birth_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'address'=>$faker->address(),
        'position'=>$faker->randomElement(['Admin', 'Customer Service']),
    ];
});
