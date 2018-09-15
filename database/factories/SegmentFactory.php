<?php

use Faker\Generator as Faker;

$factory->define(App\Segment::class, function (Faker $faker) {
    return [
        'streetname' => $faker->streetName,
        'score' => $faker->randomNumber,
        'polyline' => [{"latitude": 1}],
        'origin_latitude' => 1.2,
        'origin_longitude' => 2.3,
        'destination_latitude' => 3.4,
        'destination_longitude' => 4.5
    ];
});
