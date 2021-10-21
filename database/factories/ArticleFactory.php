<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(15),
        'body' => $faker->realText(200),
        'thumbnail' => 'sample01.jpg',
        'category_id' => $faker->numberBetween(1, 5),
        'user_id' => $faker->numberBetween(1, 10),
        'created_at' => $faker->dateTimeBetween('-4 week', '-2 week')->format('Y-m-d H:i:s'),
        'updated_at' => $faker->dateTimeBetween('-2 week', 'now')->format('Y-m-d H:i:s'),
    ];
});
