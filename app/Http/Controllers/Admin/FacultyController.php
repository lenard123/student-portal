<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\SchoolYear;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index()
    {
        $active_department = settings()->getActiveDepartment();
        $faculties = Faculty::with('user')->where('department', $active_department)->get();
        return view('pages.admin.faculty.index', compact('faculties'));
    }
}
