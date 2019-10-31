<?php

use Illuminate\Database\Seeder;
use App\Year;

class YearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Year::class, 100)->create();

    }
}
