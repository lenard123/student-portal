<?php

require_once '__bootstrap.php';

middleware('post_method_only', 'teachers_only', 'can_add_work');

validate_request([
    'title' => 'required',
    'instruction' => 'required',
    'deadline' => 'nullable|date:Y-m-d|after:yesterday'
]);

$class = Classes::where('code', get('code'))->first();

$work = new ClassWork();
$work->fill(request_only('title', 'instruction', 'deadline'));
$work->class()->associate($class);
$work->save();
$work->uploadAttachments($_FILES['attachments']);

response($work, 201);