<?php

namespace Pharavel\Socialite;

use Illuminate\Contracts\Auth\UserProvider;
use Socialite;
use AuthenticationException;

class CustomUserProvider implements UserProvider
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
}
