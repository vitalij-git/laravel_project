<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AttendanceGroup;
use Faker\Generator as Faker;

$factory->define(AttendanceGroup::class, function (Faker $faker) {
    $diffucilty=array("easiest","easy","normal","hard","hardest");
    return [
        "name"=> $faker->company(),
        "description"=>$faker->text(),
        "difficulty"=>$diffucilty[rand(0,4)],
        "school_id"=>rand(1,10)
    ];

});
