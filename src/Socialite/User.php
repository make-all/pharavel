<?php

namespace Pharavel\Socialite;

use SocialiteProviders\Manager\OAuth2\User as SocialiteUser;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends SocialiteUser implements Authenticatable
{
    public function getAuthIdentifierName()
    {
        return "access_token";
    }

    public function getAuthIdentifier()
    {
        return $this->token;
    }

    public function getAuthPassword()
    {
        // Dummy that will pass checks on passwords
        return "D0esN0tNeedPassw0rd!";
    }

    public function getAuthPasswordName()
    {
        // direct passwords not supported, but return a dummy value
        return "password";
    }

    public function getRememberToken()
    {
        return "";
    }

    public function setRememberToken($value)
    {
        //
    }

    public function getRememberTokenName()
    {
        // Give an actual name in case it is used as a key internally in Laravel
        return "remember_token";
    }
}
