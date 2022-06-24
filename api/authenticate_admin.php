<?php 

require_once '__bootstrap.php';

middleware('post_method_only');

$result = AdminAuth::attempt(request_only('email', 'password'));

switch ($result) {
    case AdminAuth::STATUS_INVALID_EMAIL:
    case AdminAuth::STATUS_WRONG_PASSWORD:
    case AdminAuth::STATUS_WRONG_CREDENTIAL:
        abort('Wrong Email or Password', 401);
        break;
    
    case AdminAuth::STATUS_SUCCESS:
        response(['message' => 'Successfully Login']);
        break;

    default:
        abort('Unknown error occured');
        break;
}