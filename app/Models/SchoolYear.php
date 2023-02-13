<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_year',
        'department'
    ];

    public function isActive()
    {
        $active_school_year = settings()->getActiveSchoolYear($this->department);
        return optional($active_school_year)->id == $this->id;
    }

    public function setAsActive()
    {
        Setting::firstOrCreate()->query()->update([
            $this->department => $this->id
        ]);
    }
}
