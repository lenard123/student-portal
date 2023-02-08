<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function studentLogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('message', [
            'type' => 'error',
            'message' => 'Wrong email or password.'
        ]);
    }

    public function adminLogin(Request $request)
    {
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->with('message', [
            'type' => 'error',
            'message' => 'Wrong email or password.'
        ]);
    }
}
