<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AttendanceGroup;
use App\Author;
use App\Student;
use Faker\Generator as Faker;
$factory->define(Student::class, function (Faker $faker) {
    return [
        "name"=> $faker->firstName(),
        "surname"=>$faker->lastName(),
        "group_id"=>factory(AttendanceGroup::class)->create()->id,
        "image_url"=>$faker->imageUrl(640, 480, 'animals', true)
    ];

});
