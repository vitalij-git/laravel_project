<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // DB::table('posts')->insert([
        //     'title' => $faker->company(),
        //     'description' => $faker->paragraph(10),
        //     'content'=> $faker->paragraph(30),
        //     'category_id'
        // ]);
        factory(App\Post::class, 30)->create();
    }
}
