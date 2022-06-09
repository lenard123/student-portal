<?php

function dd($var)
{
    header("Content-Type: application/json");
    echo json_encode($var);
    die();
}

function abort($status = 500, $message = 'Server Error')
{
    header($status);
    header("Content-Type: text/plain");
    echo $message;
    die();
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