<?php

class Classes extends Model
{
    protected $table = 'classes';

    protected $fillable = ['name', 'grade', 'section'];

    protected $withCount = ['students'];

    private static $covers = [
        ('img/cover/1.jpg'),
        ('img/cover/2.jpg'),
        ('img/cover/3.jpg'),
        ('img/cover/4.jpg'),
        ('img/cover/5.jpg'),
        ('img/cover/6.jpg'),
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'class_students','class_id', 'student_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'class_id')->latest();
    }

    public function works()
    {
        return $this->hasMany(ClassWork::class, 'class_id')->latest();
    }

    public function getCoverAttribute()
    {
        return asset($this->attributes['cover']);
    }

    public static function generateCode()
    {
        return strtoupper(generateRandomString(4) . '-' . generateRandomString(4));
    }

    public static function generateCover()
    {
        $covers = static::$covers;        
        $i = rand(0, count($covers) - 1);
        return $covers[$i];
    }

}
