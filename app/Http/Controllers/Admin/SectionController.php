<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\GradeLevel;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index(Request $request)
    {
        $grade_level = $request->grade_level;
        $sections = Section::withCount('subjects', 'students')->where('grade_level_id', $request->grade_level)->get();
        return view('pages.admin.sections.index', compact('sections', 'grade_level'));
    }

    public function show(Section $section)
    {
        $section->load('students', 'subjects');
        $department = $section->gradeLevel->department;
        $faculties = Faculty::with('user')->where('department', $department)->get();
        return view('pages.admin.sections.show', compact('section', 'faculties'));
    }

    public function createForm(Request $request)
    {
        $grade_level = GradeLevel::find($request->grade_level);
        $subjects = Subject::all();

        return view('pages.admin.sections.new', compact('grade_level', 'subjects'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'grade_level' => 'required|exists:grade_levels,id',
            'section' => 'required',
            'subjects' => 'required|array',
            'subjects.*' => 'exists:subjects,id'
        ]);

        $grade_level = GradeLevel::find($request->grade_level);

        $section = Section::create([
            'school_year_id' => settings()->getActiveSchoolYear($grade_level->department)->id,
            'grade_level_id' => $grade_level->id,
            'name' => $request->section
        ]);

        $section->subjects()->sync($request->subjects);

        return redirect("/admin/classes?grade_level={$grade_level->id}");
    }
}
