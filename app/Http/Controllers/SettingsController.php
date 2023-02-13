<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function updateActiveDepartment(Request $request)
    {
        $this->validate($request, [
            'department' => 'required|in:pre-school,elementary,highschool,senior-highschool'
        ]);

        session(['active_department' => $request->department]);

        return back();
    }
}
