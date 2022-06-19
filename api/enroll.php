<?php

require_once '__bootstrap.php';
middleware('post_method_only', 'students_only');

validate_request([
    'code' => 'required'
]);

$class = Classes::where('code', post('code'))->first();

if (is_null($class)) {
    abort('Invalid Class Code', 400);
}
response(Auth::user()->enroll($class));