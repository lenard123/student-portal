<?php


class Auth
{

    const STATUS_SUCCESS = 1;
    const STATUS_INVALID_EMAIL = 2;
    const STATUS_WRONG_PASSWORD = 3;
    const STATUS_WRONG_CREDENTIAL = 4;

    protected static $session_id = 'user_id';

    private static $user = null;

    public static function check()
    {
        return Session::has(static::$session_id);
    }

    public static function id()
    {
        if (!static::check())
            return null;

        return intval(Session::get(static::$session_id, -1));
    }

    public static function role($role = null)
    {
        if (!Auth::check()) 
            return null;

        if (! is_null($role) )
            return Auth::user()->role === $role;

        return Auth::user()->role;
    }

    public static function user()
    {
        if (is_null(static::$user)) {
            if (static::check()) {
                static::$user = User::query()->find(static::id());
            }
        }

        return static::$user;
    }

    public static function logout()
    {
        static::$user = null;
        Session::destroy(static::$session_id);
    }

    public static function attempt($credential)
    {
        $user = User::where('email', $credential['email'])->first();

        if ($user === null)
            return static::STATUS_INVALID_EMAIL;

        if (! password_verify($credential['password'], $user->password))
            return static::STATUS_WRONG_PASSWORD;

        $result = static::validateAuth($user);

        if ($result === static::STATUS_SUCCESS){
            static::$user = $user;
            Session::set(static::$session_id, $user->id);
        }

        return $result;
    }

    protected static function validateAuth($user)
    {
        if ($user->isAdmin())
            return static::STATUS_WRONG_CREDENTIAL;
        return static::STATUS_SUCCESS;
    }

}
