<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\School;
use Faker\Generator as Faker;

$factory->define(School::class, function (Faker $faker) {
    return [
        "name"=> $faker->company(),
        "description"=>$faker->text(),
        "place"=>$faker->address() ,
        "phone"=>"86".$faker->randomNumber(7, true)
    ];

    });

