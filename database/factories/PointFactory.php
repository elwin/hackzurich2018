<?php

use Faker\Generator as Faker;

$factory->define(App\Point::class, function (Faker $faker) {
    return [
        'latitude' => $faker->randomFloat(NULL, -90, 90),
        'longitude' => $faker->randomFloat(NULL, -180, 180),
        'speed' => $faker->randomFloat(NULL, 0, 100),
        'avg_speed' => $faker->randomFloat(NULL, 0, 100)
    ];
});
