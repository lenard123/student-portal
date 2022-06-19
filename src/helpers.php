<?php

function dd($var)
{
    header("Content-Type: application/json");
    echo json_encode($var);
    die();
}



function response($data, $status = 200)
{
    http_response_code($status);
    header("Content-Type: application/json");
    die(json_encode($data));
}

function abort($message = 'Server Error', $status = 500, $data = null)
{
    ob_end_clean();
    response(compact('message', 'data'), $status);
}

function page_title($title = null)
{
    if ($title) $title .= ' | ';
    return $title . 'The Lord\'s Wisdom Academy of Caloocan Inc.';
}

function student_title($title = null)
{
    if ($title) $title .= ' | ';
    return $title . 'Student Portal';
}

function teacher_title($title = null)
{
    if ($title) $title .= ' | ';
    return $title . 'Teacher Portal';   
}

function baseURL()
{
    if (defined('BASE_URL'))
        return BASE_URL;
}

function url($path = '')
{
    return baseURL() . $path;
}

function asset($path = '')
{
    return baseURL() . 'assets/' . $path;
}

function sanitize_input($value)
{
    return trim($value);
}

function redirect($location)
{
    header('Location: '. url($location));
    exit();
}

function back()
{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

function middleware(...$names)
{
    foreach ($names as $name) {
        Middleware::$name();
    }
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}