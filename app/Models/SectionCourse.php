<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\isNull;

class SectionCourse extends Model
{
    use HasFactory;

    protected $table = 'section_subject';

    protected $guarded = [];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    protected function schedule(): Attribute
    {
        return Attribute::make(
            get: fn ($sched) => ($sched == null) ? ['day' => null, 'time' => null] : json_decode($sched,true)
        );
    }
}
