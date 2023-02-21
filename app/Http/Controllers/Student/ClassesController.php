<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Section;
use App\Models\SectionCourse;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $section_id = auth()->user()->student->sections->first()?->id;
        $section = Section::find($section_id)?->load('courses', 'courses.subject', 'courses.faculty');
        return view('pages.student.classes', compact('section'));
    }

    public function show(SectionCourse $course)
    {
        return view('pages.student.show-classes', compact('course'));
    }

    public function showLesson(SectionCourse $course, Lesson $lesson)
    {
        return view('pages.student.show-lesson', compact('course', 'lesson'));
    }
}
