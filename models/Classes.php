<?php

class Classes extends Model
{
    protected $table = 'classes';

    protected $fillable = ['name', 'grade', 'section'];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public static function generateCode()
    {
        return strtoupper(generateRandomString(4) . '-' . generateRandomString(4));
    }
}
