<?php

namespace App\Auth;

use Illuminate\Auth\SessionGuard;

class AdminGuard extends SessionGuard
{
    protected function hasValidCredentials($user, $credentials)
    {
        if (optional($user)->role === 'admin') {
            return parent::hasValidCredentials($user, $credentials);
        }

        return false;
    }
}
