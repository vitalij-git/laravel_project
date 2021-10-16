<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // DB::table('schools')-> insert([
        //     "name"=> $faker->company(),
        //     "description"=>$faker->text(),
        //     "place"=>$faker->address() ,
        //     "phone"=>"86".$faker->randomNumber(7, true),
        //
        // ]);
      //  factory(App\School::class, 10)->create();
    }
}
