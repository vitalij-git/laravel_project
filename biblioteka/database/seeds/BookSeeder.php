<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // for($i=0;$i<100;$i++){
            DB::table('books')->insert([
                    'title'=>$faker->company(),
                    'isbn'=>$faker->isbn13(),
                    'about'=>$faker->text(),
                    'pages'=>rand(1, 99),
                    'author_id'=>rand(1,10)
            ]);
        // }
    }
}
