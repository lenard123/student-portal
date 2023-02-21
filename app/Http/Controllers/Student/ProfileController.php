<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        // dd($request->all());
        auth()->user()->student->update($request->only(
            'civil_status',
            'birthday',
            'nationaltity',
            'religion',
            'gender',
            'has_disability',
            'height',
            'weight'
        ));
        return redirect('/profile');
    }
}
