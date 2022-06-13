<?php 

require_once '__bootstrap.php';

middleware('post_method_only');

$email = request('email');
$password = request('password');

$result = AdminAuth::login($email, $password);

switch ($result) {
    case ERROR_WRONG_EMAIL:
    case ERROR_WRONG_PASSWORD:
        abort('Wrong Email or Password', 401);
        break;
    
    case SUCCESS:
        response(['message' => 'Successfully Login']);
        break;

    default:
        abort('Unknown error occured');
        break;
}