<?php

class AdminAuth extends Auth
{
    protected static $session_id = 'admin_id';

    protected static function validateAuth(User $user)
    {
        if ($user->isAdmin())
            return static::STATUS_SUCCESS;

        return static::STATUS_WRONG_CREDENTIAL;
    }
}