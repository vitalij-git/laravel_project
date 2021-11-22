<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'title'=>$faker->word(),
        'description'=>$faker->paragraph(10),
        'visible'=>0
    ];
});
