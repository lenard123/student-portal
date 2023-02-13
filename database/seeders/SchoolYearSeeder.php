<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolYear::create(['department' => 'pre-school', 'school_year' => '2022-2023'])->setAsActive();
        SchoolYear::create(['department' => 'elementary', 'school_year' => '2022-2023'])->setAsActive();
        SchoolYear::create(['department' => 'highschool', 'school_year' => '2022-2023'])->setAsActive();
        SchoolYear::create(['department' => 'senior-highschool', 'school_year' => '2022-2023'])->setAsActive();
    }
}
