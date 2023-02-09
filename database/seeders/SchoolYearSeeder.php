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
        SchoolYear::create(['department' => 'pre-school', 'school_year' => '2021-2022']);
        SchoolYear::create(['department' => 'pre-school', 'school_year' => '2022-2023']);
    }
}
