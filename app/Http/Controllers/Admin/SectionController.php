<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GradeLevel;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'grade_level' => 'required|exists:grade_levels,id'
        ]);

        $grade_level = $request->grade_level;
        $sections = Section::where('grade_level_id', $request->grade_level)->get();
        return view('pages.admin.sections.index', compact('sections', 'grade_level'));
    }

    public function createForm(Request $request)
    {
        $this->validate($request, [
            'grade_level' => 'required|exists:grade_levels,id'
        ]);

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

        $grade_level = $request->grade_level;

        $section = Section::create([
            'grade_level_id' => $grade_level,
            'name' => $request->section
        ]);

        $section->subjects()->sync($request->subjects);

        return redirect("/admin/classes?grade_level=$grade_level");
    }
}
