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

    public static function can_view_class()
    {
        $code = get('code');
        $class = Classes::where('code', $code)->first();

        if ( is_null($class) || !Auth::user()->canViewClass($class)) {
            die(component('errors/404'));
        }
        return $class;
    }

    public static function can_add_work()
    {
        $code = get('code');
        $class = Classes::where('code', $code)->first();
        if ( is_null($class) || !Auth::user()->canViewClass($class)) {
            die(component('errors/404'));
        }
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

            $_POST = $_POST + ($request_body ?? []);

            foreach($_POST as $key => $value) {
                //Trim 
                $value = trim($value);

                if (strlen($value) <= 0) $value = null;

                $_POST[$key] = $value;
            }

            if (is_array($_FILES)) {
                foreach($_FILES as $name => $file) {
                    $tmp = array();
                    $n = count($file["name"]);
                    for($i = 0; $i < $n; $i++)
                    {
                        $tmp[$i] = array();
                        foreach ($file as $key => $value) {
                            $tmp[$i][$key] = $value[$i];                        
                        }
                    } 
                    $_FILES[$name] = $tmp;
                }
            }
        }
    }

    public static function __callStatic($name, $args)
    {
        return require ROOT_PATH . '/middlewares/' . $name . '.php';
    }
}