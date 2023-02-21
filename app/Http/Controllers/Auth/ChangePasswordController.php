<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rules\Password;

class ChangePasswordController extends Controller
{
    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'password' => ['required', 'current_password:student'],
            'new_password' => 'required|min:8|confirmed'
        ]);

        auth()->user()->update([
            'password' => $request->new_password
        ]);

        return back()->with([
            'type' => 'success',
            'message' => 'Password Changed Successfully'
        ]);
    }

    public function changeFacultyPassword(Request $request)
    {
        $this->validate($request, [
            'password' => ['required', 'current_password:faculty'],
            'new_password' => 'required|min:8|confirmed'
        ]);

        auth('faculty')->user()->update([
            'password' => $request->new_password
        ]);

        return back()->with([
            'type' => 'success',
            'message' => 'Password Changed Successfully'
        ]);
    }
}
