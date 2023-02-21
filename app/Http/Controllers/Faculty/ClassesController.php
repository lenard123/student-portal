<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\SectionCourse;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $courses = $user->faculty->courses;
        $courses->load('subject', 'section', 'section.students');
        return view('pages.faculty.classes.index', compact('courses'));
    }

    public function show(SectionCourse $course)
    {
        $course->load('lessons');
        return view('pages.faculty.classes.show', compact('course'));
    }

    public function showLesson(SectionCourse $course, Lesson $lesson)
    {
        return view('pages.faculty.classes.show-lesson', compact('course', 'lesson'));
    }

    public function createLesson(Request $request, SectionCourse $course)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);
        $lesson = $course->lessons()->create($request->only('title', 'content'));

        return back();
    }
}
