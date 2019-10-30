<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Flight::class, function (Faker\Generator $faker) {
    return [
        'origin' => $faker->randomElement(['LAX', 'SEA', 'PDX', 'BUR']),
        'destination' => $faker->randomElement(['LAX', 'SEA', 'PDX', 'BUR']),
        'departs' => $faker->dateTimeThisMonth
    ];
});
