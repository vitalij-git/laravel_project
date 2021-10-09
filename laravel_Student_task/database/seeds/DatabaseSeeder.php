<?php

use App\AttendanceGroup;
use App\School;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AttendanceGroupSeeder::class,
            SchoolSeeder::class,
            StudentSeeder::class
        ]);
    }
}
