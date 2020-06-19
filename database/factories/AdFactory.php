<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\Ad;
use App\Entities\User;
use Faker\Generator as Faker;

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

$factory->define(Ad::class, function (Faker $faker) {
    return [
        'author_id' => User::query()->inRandomOrder()->first()->id,
        'description' => $faker->text(),
        'title' => $faker->title(),
        'created_at' => $faker->dateTime(),
    ];
});
