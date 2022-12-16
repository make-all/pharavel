<?php

namespace Pharavel\Socialite;

use SocialiteProviders\Manager\OAuth2\User as SocialiteUser;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends SocialiteUser implements Authenticatable
{
    public function getAuthIdentifierName()
    {
        return $this->getNickname();
    }

    public function getAuthIdentifier()
    {
        return $this->getId();
    }

    public function getAuthPassword()
    {
        // Dummy that will pass checks on passwords
        return "D0esN0tNeedPassw0rd!";
    }

    public function getRememberToken()
    {
        return "";
    }

    public function setRemeberToken(string $value)
    {
    }

    public function getRemeberTokenName()
    {
        return "";
    }
}
