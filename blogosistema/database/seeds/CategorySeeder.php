<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // DB::table('categories')->insert([
        //     'title' => $faker->company(),
        //     'description' => $faker->paragraph(10),
        //     'visible'=> 0
        // ]);
        factory(App\Category::class, 30)->create();
    }
}
