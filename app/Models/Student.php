<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'department',
        'contact_number',
        'student_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function enrollee()
    {
        return $this->hasOne(Enrollee::class)->where('school_year_id', settings()->getActiveSchoolYear());
    }
}
