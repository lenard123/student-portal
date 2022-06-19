<?php

class Post extends Model
{
    protected $fillable = ['content'];

    public $timestamps = true;

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}