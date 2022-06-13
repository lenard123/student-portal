<?php

require_once '__bootstrap.php';

middleware('post_method_only');

validate_request([
    'email' => 'required|email',
    'password' => 'required'
]);


switch (Auth::attempt(request_only('email', 'password')))
{
    case Auth::STATUS_INVALID_EMAIL:
        abort('We can\'t find a user that belongs to your email.', 401);
        break;
    case Auth::STATUS_WRONG_PASSWORD:
        abort('Wrong Password', 401);
        break;
    case Auth::STATUS_WRONG_CREDENTIAL:
        abort('Wrong email or password', 401);
        break;
    case Auth::STATUS_SUCCESS:
        response(Auth::user());
        break;
    default:
        abort('An unknown error occured');
        break;
}