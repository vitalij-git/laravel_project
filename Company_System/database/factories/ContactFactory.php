<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        "title"=>$faker->word(),
        "phone"=>"86".$faker->randomNumber(7, true),
        "address"=>$faker->streetAddress(),
        "email"=>$faker->email(),
        "country"=>$faker->country(),
        "city"=>$faker->city()
    ];
});
