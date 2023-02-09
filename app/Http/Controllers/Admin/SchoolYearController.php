<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolYear;
use Illuminate\Http\Request;

class SchoolYearController extends Controller
{
    public function index()
    {
        $active_department = settings()->getActiveDepartment();
        $school_years = SchoolYear::where('department', $active_department)->get();
        return view('pages.admin.settings.school-year', compact('school_years'));
    }

    public function updateActiveSchoolYear(Request $request)
    {
        $this->validate($request, [
            'school_year_id' => 'required|exists:school_years,id'
        ]);

        $school_year = SchoolYear::find($request->school_year_id);

        $school_year->setAsActive();

        return back();
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'school_year' => 'required|unique:school_years',
        ]);

        $school_year = SchoolYear::create([
            'school_year' => $request->school_year,
            'department' => settings()->getActiveDepartment()
        ]);

        return back();
    }
}
