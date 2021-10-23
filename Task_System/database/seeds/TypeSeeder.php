<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'title' => 'atlikta',
            'description' => Str::random(30),
        ]);
        DB::table('types')->insert([
            'title' => 'neatlikta',
            'description' => Str::random(30),
        ]);
        DB::table('types')->insert([
            'title' => 'vykdoma',
            'description' => Str::random(30),
        ]);
        DB::table('types')->insert([
            'title' => 'nebeaktuali',
            'description' => Str::random(30),
        ]);
        //factory(App\Type::class,100)->create();
    }
}
