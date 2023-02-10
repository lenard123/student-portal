<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create(['name' => 'Mathematics']);
        Subject::create(['name' => 'English']);
        Subject::create(['name' => 'Science']);
        Subject::create(['name' => 'Filipino']);
        Subject::create(['name' => 'Technology and Livelihood Education']);
        Subject::create(['name' => 'Araling Panlinpunan']);
        Subject::create(['name' => 'Edukasyon sa Pagpapakatao']);
        Subject::create(['name' => 'Music']);
        Subject::create(['name' => 'Arts']);
        Subject::create(['name' => 'Physical Education']);
        Subject::create(['name' => 'Health']);
    }
}
