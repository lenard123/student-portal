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
}
