<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::factory()->preSchool()->count(33)->create();
        Student::factory()->elementary()->count(33 * 2 * 6)->create();
        Student::factory()->highschool()->count(33 * 2 * 4)->create();
        Student::factory()->seniorHighschool()->count(33 * 4 * 2)->create();
    }
}
