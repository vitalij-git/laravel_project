<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_items')->insert([
            'title' => Str::random(10),
            'book_code' => rand(1,10),
            'pages' => rand(100,300),
            'description' => Str::random(10),
            'author_id' => rand(1,4)
        ]);
    }
}
