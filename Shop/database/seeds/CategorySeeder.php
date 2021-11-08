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
       for($i=0;$i<50;$i++){
        DB::table('categories')->insert([
            'title'=>$faker->company(),
            'description'=>$faker->paragraph(10),
            'shop_id'=>rand(1,10)
          ]);
        }
    }


}
