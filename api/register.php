<?php

require_once '__bootstrap.php';
middleware('post_method_only');

validate_request([
    'role' => 'required',
    'firstname' => 'required',
    'lastname' => 'required',
    'email' => 'required|email',
    'gender' => 'required',
    'birthday' => 'required',
    'password' => 'required|min:8',
    'password_confirmation' => 'required|same:password'
]);

if (User::where('email', request('email'))->exists()) {
    abort('Email already registered', 422);
}

$user = User::create(request_only(
    'role', 
    'firstname', 
    'lastname', 
    'middlename',
    'email',
    'password',
    'birthday',
    'gender'
));

response($user, 201);