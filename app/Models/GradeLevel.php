<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeLevel extends Model
{
    use HasFactory;

    public function sections()
    {
        $school_year_id = settings()->getActiveSchoolYear()->id;
        return $this->hasMany(Section::class)->where('sections.school_year_id', $school_year_id);
    }
}
