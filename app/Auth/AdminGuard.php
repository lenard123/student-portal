<?php

namespace App\Auth;

use App\Models\User;
use Illuminate\Auth\SessionGuard;

class AdminGuard extends SessionGuard
{
    protected function hasValidCredentials($user, $credentials)
    {
        if (optional($user)->role === User::ROLE_ADMIN) {
            return parent::hasValidCredentials($user, $credentials);
        }

        return false;
    }
}
