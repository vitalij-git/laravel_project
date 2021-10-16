<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        "title"=> $faker->company(),
        "description"=>$faker->text(),
        "logo"=>$faker->imageUrl(150,150,null,true)
    ];
});
