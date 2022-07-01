<?php

class ClassWork extends Model
{
    protected $table = 'class_works';

    protected $fillable = ['title', 'instruction', 'deadline'];

    public $timestamps = true;

    protected $casts = [
        'deadline' => 'date:Y-m-d'
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}