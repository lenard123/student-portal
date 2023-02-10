<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['grade_level_id', 'name'];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class)
            ->withPivot('faculty_id', 'schedule')
            ->using(SectionSubject::class);
    }
}
