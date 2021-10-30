<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
class OwnerSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0;$i<15;$i++){
        DB::table('owners')->insert([
            "name"=>$faker->firstname(),
            "surname"=>$faker->lastName(),
            "email"=>$faker->email(),
            "phone"=>$faker->phoneNumber()
        ]);
        }
    }
}
