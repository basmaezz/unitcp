<?php

use Faker\Generator as Faker;
use App\Year;

$factory->define(Year::class, function (Faker $faker) {
    return [
        'name' =>  $faker->numberBetween(1990,2020),

    ];
});
