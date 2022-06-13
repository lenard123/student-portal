<?php

class Session
{
    public static function init()
    {
        session_start();
    }   

    public static function has($key)
    {
        return isset($_SESSION[$key]);
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        if (static::has($key))
            return $_SESSION[$key];

        return $default;
    }

    public static function destroy($key)
    {
        unset($_SESSION[$key]);
    }
}