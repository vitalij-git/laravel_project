<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('authors')-> insert([
        //     'name'=> 'name',
        //     'surname'=>'surname',
        //     'username'=> 'username'
        // ]);
        factory(App\Author::class, 50)->create()->each(function ($user) {
            $user->posts()->save(factory(App\Post::class)->make());
        });
        // factory(Author::class,50)->create();

    }
}
