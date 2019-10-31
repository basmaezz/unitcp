<?php

use Faker\Generator as Faker;
use App\User;
use App\Faculty;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $faculty = Faculty::query()->inRandomOrder()->first();
    return [
        'name' => $faker->name,
        'username' => $faker->username,
        'email' => $faker->unique()->safeEmail,
        'img' => $faker->image('public/uploads/users/profiles/',400,300),
        'faculty_id' => $faculty->id,
        'active' => $faker->numberBetween(0,1),
        'online' => $faker->numberBetween(0,1),
        'permission' => $faker->numberBetween(1,3),
        'password' => bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});
