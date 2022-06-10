<?php

function is_login()
{
    return isset($_SESSION['user_id']);
}

function is_admin_login()
{
    if (!is_login()) return false;

    $user = current_user();

    return $user->role === ROLE_ADMIN;
}

function current_user_id()
{
    if (!is_login()) 
        return null;
    return $_SESSION['user_id'];
}

function current_user()
{
    static $user;

    if (!is_login()) 
        return null;


    if (!$user) {
        $user = User::find( current_user_id() );
    } 

    return $user;
}

function authenticate_admin($email, $password)
{
    $user = User::where('email', $email)->first();

    if ($user == null) 
        return ERROR_WRONG_EMAIL;

    if (!password_verify($password, $user->password))
        return ERROR_WRONG_PASSWORD;

    return SUCCESS;
}