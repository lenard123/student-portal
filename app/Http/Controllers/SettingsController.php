<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function updateActiveDepartment(Request $request)
    {
        $this->validate($request, [
            'department' => 'required|in:pre-school,elementary,highschool,senior_highschool'
        ]);

        session(['active_department' => $request->department]);

        return back();
    }
}
