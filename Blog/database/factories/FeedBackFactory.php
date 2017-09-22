<?php

use Faker\Generator as Faker;

$factory->define(App\FeedBack::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 6005),
        'date_time' => $faker->dateTime,
        'content' => $faker->text,
        'is_read' => rand(0,1),
    ];
});
