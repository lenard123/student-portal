<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\GradeLevel;
use App\Models\Section;
use App\Models\Subject;
use App\Models\SectionCourse;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index(Request $request)
    {
        $grade_level = $request->grade_level;
        $sections = Section::withCount('courses', 'students')->where('grade_level_id', $request->grade_level)->get();
        return view('pages.admin.sections.index', compact('sections', 'grade_level'));
    }

    public function show(Section $section)
    {
        $section->load('students', 'courses', 'courses.faculty', 'courses.faculty.user', 'courses.subject');
        $department = $section->gradeLevel->department;
        // dd($section->courses[0]->schedule);
        $faculties = Faculty::with('user')->where('department', $department)->get();
        return view('pages.admin.sections.show', compact('section', 'faculties'));
    }

    public function updateSubject($section, SectionCourse $course, Request $request)
    {
        $course->faculty_id = $request->faculty_id;
        $course->schedule = $request->only('day', 'time');
        $course->update();

        return back();
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

        foreach ($request->subjects as $subject) {
            $section->courses()->create([
                'subject_id' => $subject
            ]);
        }

        return redirect("/admin/classes?grade_level={$grade_level->id}");
    }
}
