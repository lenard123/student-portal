<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Response|RedirectResponse
    {
        switch ($request->guard) {
            case "admin":
                auth('admin')->logout();
                return redirect('/admin/login');
            case "faculty":
                auth("faculty")->logout();
                return redirect("/faculty/login");
        }

        auth()->logout();
        return redirect('/login');
    }
}
