<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    
        return [
            'first_name' => $faker->firstNameFemale,
            'last_name'  => $faker->lastName,
            'level_id' => 2,
            'email' => $faker->unique()->safeEmail,
            'activate' => 1,
            'avatar' => 'https://i.pinimg.com/736x/be/0a/b7/be0ab7e1a7f2f5a319e190ec0bad1e31--cute-girls-vietnam.jpg',
            'token_datetime' => $faker->dateTime,
            'password' => $password ?: $password = bcrypt('secret'),
            'token' => bcrypt($faker->word),
            //'remember_token' => str_random(10),
        ];
});
