<?php

namespace Pharavel\Socialite;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider as BaseProvider;
use Laravel\Socialite\Facades\Socialite;

class UserProvider implements BaseProvider
{
    public function retrieveById($id)
    {
        try {
            return Socialite::driver('phorge')->userFromToken($id);
        }
        catch (AuthenticationException $e) {
            return null;
        }
    }

    public function retrieveByToken($id, $token)
    {
        return retrieveById($id);
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        // remember tokens not supported
    }

    public function retrieveByCredentials(array $credentials)
    {
        // direct login not supported
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return false;
    }

    public function rehashPasswordIfRequired(Authenticatable $user, $credentials, $force=false)
    {
        // password hashing not supported
    }
}
