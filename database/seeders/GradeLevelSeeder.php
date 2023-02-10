<?php

namespace Database\Seeders;

use App\Models\GradeLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $department => $levels) {
            foreach ($levels as $level) {
                GradeLevel::create(compact('department', 'level'));
            }
        }
    }

    private function data()
    {
        return [
            'pre-school' => [
                'Kinder'
            ],
            'elementary' => [
                'Grade 1',
                'Grade 2',
                'Grade 3',
                'Grade 4',
                'Grade 5',
                'Grade 6'
            ],
            'highschool' => [
                'Grade 7',
                'Grade 8',
                'Grade 9',
                'Grade 10',
            ],
            'senior-highschool' => [
                'Grade 11',
                'Grade 12'
            ]
        ];
    }
}
