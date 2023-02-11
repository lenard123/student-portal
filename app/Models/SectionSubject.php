<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class SectionSubject extends Pivot
{
    protected $with = ['faculty'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id', 'user_id');
    }
}
