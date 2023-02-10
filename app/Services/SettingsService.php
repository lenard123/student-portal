<?php

namespace App\Services;

use App\Models\GradeLevel;
use App\Models\SchoolYear;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsService
{

    private ?SchoolYear $active_school_year = null;
    private Setting $setting;

    public function __construct()
    {
        $this->setting = Setting::firstOrCreate();
    }

    public function getSetting()
    {
        return $this->setting;
    }

    public function getActiveDepartment()
    {
        return session('active_department', 'pre-school');
    }

    public function getActiveSchoolYear($department = null): ?SchoolYear
    {
        if ($this->active_school_year === null) {
            $active_department = $department ?: $this->getActiveDepartment();
            $school_year = $this->setting->$active_department;
            $this->active_school_year = SchoolYear::find($school_year);
        }

        return $this->active_school_year;
    }

    public function getGradeLevels()
    {
        $active_department = $this->getActiveDepartment();
        return GradeLevel::where('department', $active_department)->get();
    }
}
