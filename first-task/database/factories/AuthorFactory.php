<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Author;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Author::class, function (Faker $faker) {
    return [
            'name'=> $faker->name,
            'surname'=>$faker->sentence(2),
            'username'=>str::random(15),
    ];
});
