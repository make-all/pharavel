<?php

namespace Pharavel\Socialite;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as BaseProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends BaseProvider
{
    /**
     * Register authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::provider('phorge', function ($app, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\UserProvider
            return new UserProvider();
        });
    }
}

