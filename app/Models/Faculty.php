<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'user_id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses()
    {
        $school_year_id = settings()->getActiveSchoolYear($this->department)->id;
        return $this->hasMany(SectionCourse::class, 'faculty_id')
            ->whereHas('section', fn ($q) => $q->where('school_year_id', $school_year_id));
    }
}
