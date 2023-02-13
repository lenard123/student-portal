<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['school_year_id', 'grade_level_id', 'name'];

    protected $with = ['gradeLevel'];

    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'section_student', 'section_id', 'student_id');
    }

    public function courses()
    {
        return $this->hasMany(SectionCourse::class);
    }
}
