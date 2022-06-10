<?php

function dd($var)
{
    header("Content-Type: application/json");
    echo json_encode($var);
    die();
}



function response($status = 200, $data)
{
    http_response_code($status);
    header("Content-Type: application/json");
    die(json_encode($data));
}

function abort($status = 500, $message = 'Server Error', $data = null)
{
    ob_end_clean();
    response($status, compact('message', 'data'));
}

function page_title($title = '')
{
    if ($title) $title .= ' | ';
    return $title . 'The Lord\'s Wisdom Academy of Caloocan Inc.';
}

function url($path = '')
{
    return BASE_URL . $path;
}

function asset($path = '')
{
    return BASE_URL . 'assets/' . $path;
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

function middleware($name)
{
    require ROOT_PATH . '/middlewares/' . $name . '.php';
}