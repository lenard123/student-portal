<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class SectionSubject extends Pivot
{
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
