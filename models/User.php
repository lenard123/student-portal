<?php

class User extends Model
{

    const ROLE_STUDENT = 'student';
    const ROLE_TEACHER = 'teacher';
    const ROLE_ADMIN = 'admin';

    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';

    protected $fillable = [
        'role',
        'firstname',
        'middlename',
        'lastname',
        'email',
        'password',
        'gender',
        'birthday',
    ];

    public function setPasswordAttribute($password) : void
    {
        $this->attributes['password'] = password_hash($password, PASSWORD_DEFAULT);
    }

    public function classes()
    {
        return $this->hasMany(Classes::class, 'teacher_id');
    }

    public function enrolled_classes()
    {
        return $this->belongsToMany(Classes::class, 'class_students', 'student_id', 'class_id');
    }

    public function isAdmin()
    {
        return $this->role === static::ROLE_ADMIN;
    }

    public function isTeacher()
    {
        return $this->role === static::ROLE_TEACHER;
    }

    public function isStudent()
    {
        return $this->role === static::ROLE_STUDENT;
    }

    public function isEnrolled(Classes $class)
    {
        return $this->enrolled_classes()
            ->where('code', $class->code)
            ->exists();
    }

    public function canViewClass(Classes $class)
    {
        if ($this->isTeacher()) {
            return $class->teacher_id = $this->id;
        }

        return $this->isEnrolled($class);
    }

    public function scopeAdmin($query)
    {
        return $query->where('role', static::ROLE_ADMIN);
    }

    public function getAvatarAttribute()
    {
        $seed = urlencode($this->firstname);
        return "https://avatars.dicebear.com/api/initials/{$seed}.svg";
    }

    public function getFullnameAttribute()
    {
        return $this->firstname." ".$this->lastname;
    }

    public function enroll(Classes $class)
    {
        if ($this->isEnrolled($class)) return;
        $class->students()->attach($this->id);
    }

    public function unEnroll(Classes $class)
    {
        if (!$this->isEnrolled($class)) return;
        $class->students()->detach($this->id);
    }
}