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

    public function scopeAdmin($query)
    {
        return $query->where('role', static::ROLE_ADMIN);
    }

    public function getAvatarAttribute()
    {
        $seed = urlencode($this->firstname);
        return "https://avatars.dicebear.com/api/initials/{$seed}.svg";
    }
}