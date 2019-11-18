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

$factory->define(App\Airport::class, function (Faker\Generator $faker) {

    $airports = [
        'LAX' => 'Los Angeles International Airport',
        'SEA' => 'Seattle-Tacoma International Airport',
        'PDX' => 'Portland International Airport',
        'ORD' => "O'Hare International Airport",
    ];

    $airport = array_rand($airports);

    return [
        'code' => $airport,
        'name' => $airports[$airport]
    ];
});
