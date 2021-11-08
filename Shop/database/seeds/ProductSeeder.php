<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0;$i<500;$i++){
            DB::table('products')->insert([
                'title'=>$faker->word(),
                'excerpt'=>$faker->paragraph(5),
                'description'=>$faker->paragraph(10),
                'price'=>$faker->randomFloat(1,1,100),
                'image'=>$faker->imageUrl(150,150),
                'category_id'=>rand(1,50)
              ]);
            }
    }
}
