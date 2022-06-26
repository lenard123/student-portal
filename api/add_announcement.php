<?php

require_once '__bootstrap.php';

middleware('post_method_only', 'admin_only');

validate_request([
    'title' => 'required',
    'description' => 'required',
]);

$announcement = new Announcement();
$announcement->fill(request_only('title', 'description'));
$announcement->author()->associate(AdminAuth::user());
$announcement->save();

response($announcement, 201);