<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    protected $with = ['sections'];

    protected $appends = ['currentSection'];

    protected $fillable = [
        'department',
        'contact_number',
        'student_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sections()
    {
        // return $this->belongsTo(Section::class, 'section_id', 'student_id', 'section_students');
        $active_school_year = settings()->getActiveSchoolYear($this->department);
        return $this->belongsToMany(Section::class, 'section_student', 'student_id')->where('sections.school_year_id', $active_school_year->id);
    }

    public function getCurrentSectionAttribute()
    {
        return $this->sections->first();
    }
}
