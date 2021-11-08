<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0;$i<10;$i++){
            DB::table('shops')->insert([
                'title'=>$faker->company(),
                'description'=>$faker->paragraph(10),
                'email'=>$faker->email(),
                'phone'=>$faker->phoneNumber(),
                'country'=>$faker->country(),
              ]);
            }
    }
}
