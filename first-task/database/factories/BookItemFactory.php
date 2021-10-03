<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\book_item;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(book_item::class, function (Faker $faker) {
    return [
            'title' => $faker->name,
            'book_code' => rand(1,10),
            'pages' => rand(100,300),
            'description' => Str::random(10),
            'author_id' => rand(1,4)
    ];
});
