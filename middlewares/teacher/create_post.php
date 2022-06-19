<?php

if (post('action') !== 'post')
    return; 
global $class;
$post = new Post();
$post->fill(request_only('content'));
$post->author()->associate(Auth::user());
$post->class()->associate($class);
$post->save();

back();