<?php

class Middleware
{
    public static function teachers_only() 
    {
        if (!Auth::check() || !Auth::user()->isTeacher())
            redirect('login.php');
    }

    public static function students_only() 
    {
        if (!Auth::check() || !Auth::user()->isStudent())
            redirect('login.php');
    }

    public static function admin_only()
    {
        if (!AdminAuth::check())
            redirect('admin/login.php');
    }

    public static function guest_admin()
    {
        if (AdminAuth::check())
            redirect('admin');
    }

    public static function authenticated()
    {
        if (! Auth::check() )
            redirect('login.php');
    }

    public static function guests_only()
    {
        if (! Auth::check()) return;

        if (Auth::user()->isTeacher()) 
            return redirect('teacher');

        if (Auth::user()->isStudent())
            return redirect('student');

    }

    public static function post_method_only()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            abort(405, 'Invalid Request Method');
        }
    }

    public static function merge_post_data()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request_body = json_decode(file_get_contents("php://input"), TRUE);

            $_POST = $_POST + $request_body;
        }
    }

    public static function __callStatic($name, $args)
    {
        require ROOT_PATH . '/middlewares/' . $name . '.php';
    }
}