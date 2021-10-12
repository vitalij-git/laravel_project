<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run( Faker $faker)
    {
        // DB::table('students')-> insert([
        //     "name"=> $faker->firstName(),
        //     "surname"=>$faker->lastName(),
        //     "group_id"=>rand(1,20),
        //     "image_url"=>$faker->imageUrl(640, 480, 'animals', true)
        // ]);
        factory(App\Student::class, 100)->create();
    }
}
