<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\type;
use Faker\Generator as Faker;

$factory->define(type::class, function (Faker $faker) {
    return [
    //    'title'=>$faker->company(),
    //    'description'=>$faker->paragraph(10)
    ];
});
