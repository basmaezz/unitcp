<?php

use App\Classes;
use App\Faculty;
use Faker\Generator as Faker;

$factory->define(Classes::class, function (Faker $faker) {
    $faculty = Faculty::query()->inRandomOrder()->first();

    return [
        'name_en' => $faker->name,
        'name_ar' => $faker->name,
        'faculty_id' => $faculty->id,
    ];
});
