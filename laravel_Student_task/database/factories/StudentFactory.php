<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;
$factory->define(Student::class, function (Faker $faker) {
    return [
        "name"=> $faker->firstName(),
        "surname"=>$faker->lastName(),
        "group_id"=>rand(1,20),
        "image_url"=>$faker->imageUrl(640, 480, 'animals', true)
    ];

});
