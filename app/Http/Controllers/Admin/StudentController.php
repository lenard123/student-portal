<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $active_department = settings()->getActiveDepartment();
        $students = Student::with('user')->where('department', $active_department)->get();
        return view('pages.admin.students.index', compact('students'));
    }
}
