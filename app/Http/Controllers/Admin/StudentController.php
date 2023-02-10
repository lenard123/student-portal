<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GradeLevel;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $active_department = settings()->getActiveDepartment();
        $students = Student::with('user')->where('department', $active_department)->get();
        $grade_levels = GradeLevel::where('department', $active_department)->get();
        return view('pages.admin.students.index', compact('students', 'grade_levels'));
    }

    public function editForm(Student $student)
    {
        return view('pages.admin.students.edit', compact('student'));
    }

    public function enrollForm(Student $student)
    {
        $grade_levels = GradeLevel::with('sections', 'sections.subjects')->where('department', $student->department)->get();

        return view('pages.admin.students.enroll', compact('student', 'grade_levels'));
    }

    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'student_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email'
        ]);

        $student->update($request->only('student_id'));
        $student->user->update($request->only('firstname', 'lastname', 'middlename', 'email'));

        return redirect('/admin/students');
    }
}
