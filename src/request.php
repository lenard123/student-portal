<?php

function received_json()
{
    return $_SERVER['CONTENT_TYPE'] === 'application/json';
}

function get($key, $default = null)
{
    if (!isset($_GET[$key])) 
        return $default;

    return $_GET[$key];
}

function post($key, $default = null)
{
    if (isset($_POST[$key])) 
        return $_POST[$key];

    return $default;
}

function request($key, $default = null)
{
    if (get($key) !== null) return get($key);

    if (post($key) !== null) return post($key);

    return $default;
}

function request_only(...$keys)
{
    $value = [];
    foreach ($keys as $key) {
        $value[$key] = request($key);
    }
    return $value;
}