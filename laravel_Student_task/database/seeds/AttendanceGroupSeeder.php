<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
class AttendanceGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $diffucilty=array("easiest","easy","normal","hard","hardest");
        // DB::table('attendance_groups')-> insert([
        //     "name"=> $faker->company(),
        //     "description"=>$faker->text(),
        //     "difficulty"=>$diffucilty[rand(0,4)],
        //     "school_id"=>rand(1,10),
        //
        // ]);
        factory(App\AttendanceGroup::class, 50)->create();
    }
}
