<?php

session_start();

function session_has($key)
{
    return isset($_SESSION[$key]);
}

function session_set($key, $value) {
    $_SESSION[$key] = $value;
}

function session_get($key, $default = null)
{
    if (session_has($key))
        return $_SESSION[$key];
    return $default;
}

function session_remove($key)
{
    unset($_SESSION[$key]);
}