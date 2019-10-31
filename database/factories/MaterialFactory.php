<?php

use App\Classes;
use App\Faculty;
use App\Material;
use App\Semester;
use Faker\Generator as Faker;

$factory->define(Material::class, function (Faker $faker) {
    $faculty = Faculty::query()->inRandomOrder()->first();
    $classes = Classes::query()->inRandomOrder()->first();
    $semester = Semester::query()->inRandomOrder()->first();
    $department = Semester::query()->inRandomOrder()->first();

    return [
        'name_en' => $faker->name,
        'name_ar' => $faker->name,
        'faculty_id' => $faculty->id,
        'class_id' => $classes->id,
        'semester_id' => $semester->id,
        'department_id' => $department->id,
    ];
});
