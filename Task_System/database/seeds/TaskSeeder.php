<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
class TaskSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0;$i<150;$i++){
        DB::table('tasks')->insert([
            'title' => $faker->company(),
            'description' => $faker->paragraph(10),
            'type_id'=>1,
            'start_date'=>Carbon::now(),
            'end_date'=>Carbon::tomorrow()
        ]);
        }
        //factory(App\Task::class,300)->create();
    }
}
