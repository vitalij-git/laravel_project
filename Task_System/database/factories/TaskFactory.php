<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\task;
use Faker\Generator as Faker;

$factory->define(task::class, function (Faker $faker) {
    return [
        // 'title'=>$faker->word(),
        // 'description'=>$faker->paragraph(15),
        // 'type_id'=>factory(App\Types::class)->create()->id
    ];
});
