<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(ClassesTableSeeder::class);
         $this->call(DepartmentTableSeeder::class);
         $this->call(FacultyTableSeeder::class);
         $this->call(SemesterTableSeeder::class);
         $this->call(MaterialTableSeeder::class);

    }
}
