<?php

class Announcement extends Model
{

    protected $fillable = ['title', 'description'];

    public $timestamps = true;

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
