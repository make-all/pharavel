<?php

namespace Pharavel\Socialite;

use SocialiteProviders\Manager\SocialiteWasCalled;

class PhorgeExtendSocialite
{
    /**
     * Execute the provider.
     */
    public function handle(SocialiteWasCalled $socialite)
    {
        $socialite->extendSocialite('phorge', __NAMESPACE__.'\Provider');
    }
}
