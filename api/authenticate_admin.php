<?php 

require_once '__bootstrap.php';

middleware('post_method_only');

$email = request('email');
$password = request('password');

$result = authenticate_admin($email, $password);

switch ($result) {
    case ERROR_WRONG_EMAIL:
    case ERROR_WRONG_PASSWORD:
        abort(401, 'Wrong Email or Password');
        break;
    
    case SUCCESS:
        response(200, ['message' => 'Successfully Login']);
        break;

    default:
        abort(500, 'Unknown error occured');
        break;
}