<?php

namespace App\Auth;

use Illuminate\Auth\SessionGuard;

class StudentGuard extends SessionGuard
{
    protected function hasValidCredentials($user, $credentials)
    {
        if (optional($user)->role === 'student') {
            return parent::hasValidCredentials($user, $credentials);
        }

        return false;
    }
}
