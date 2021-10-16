<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Type;
use Faker\Generator as Faker;

$factory->define(Type::class, function (Faker $faker) {
    return [
        "title"=> $faker->company(),
        "description"=>$faker->text(),
        "company_id"=>factory(App\Company::class)->create()->id

    ];
});
