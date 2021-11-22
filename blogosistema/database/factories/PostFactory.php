<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'=>$faker->word(),
        'description'=>$faker->paragraph(10),
        'content'=>$faker->paragraph(30),
        'image'=>$faker->imageUrl(150,150,null,true),
        'category_id'=>factory(Category::class)->create()->id,
        ];
});
