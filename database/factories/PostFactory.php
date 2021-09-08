<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [

        'title' => $faker->name(),
        'body' => $faker->name(),
        'image' => $faker->imageUrl($width = 200, $height = 200),
        'tag_id' => $faker->randomDigit(),
        'created_by' => $faker->randomDigit()
    ];
});
