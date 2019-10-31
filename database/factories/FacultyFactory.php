<?php

use Faker\Generator as Faker;
use App\Faculty;

$factory->define(Faculty::class, function (Faker $faker) {
    return [
        'name_en' => $faker->name,
        'name_ar' => $faker->name,
        'active' => $faker->numberBetween(0,1),
    ];
});
