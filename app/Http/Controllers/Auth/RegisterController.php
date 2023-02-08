<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, []);

        $new_user = User::create($request->only(
            'firstname',
            'lastname',
            'middlename',
            'email',
            'password'
        ));

        $new_user->student()->create($request->only(
            'department',
            'student_id',
            'contact_number'
        ));

        return redirect('login')->with('message', [
            'type' => 'success',
            'message' => 'Successfully Registered'
        ]);
    }
}
