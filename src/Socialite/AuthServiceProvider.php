<?php

namespace Pharavel\Socialite;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as BaseProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends BaseProvider
{
    /**
     * Register authentication / authorization services.
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/phorge.php', 'phorge',
        );
        $this->mergeConfigFrom(
            __DIR__.'/../config/services.php', 'services',
        );
    }

    public function boot()
    {
        $this->registerPolicies();

        $this->publishes([
            __DIR__.'/../config/phorge.php' => config_path('phorge.php'),
        ]);

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        Auth::provider('phorge', function ($app, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\UserProvider
            return new UserProvider();
        });
    }
}

