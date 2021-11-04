<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0;$i<10;$i++)
        {
        DB::table('authors')->insert([
            'name' => $faker->firstName(),
            'surname' => $faker->lastName(),
        ]);
        }
    }
}
