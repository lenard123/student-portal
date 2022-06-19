<?php

require_once '__bootstrap.php';

middleware('post_method_only', 'teachers_only');

validate_request([
    'name' => 'required',
    'grade' => 'required',
]);

$new_class = new Classes();
$new_class->fill(request_only('name', 'grade', 'section'));
$new_class->teacher()->associate(Auth::user());
$new_class->code = Classes::generateCode();
$new_class->cover = Classes::generateCover();
$new_class->save();

response($new_class, 201);
