<?php

namespace Pharavel\Socialite;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class LoginController extends Controller
{
    /**
	 * Redirect the user to the Phabricator authentication page
	 *
	 * @return Illuminate\Http\Response
	 */
	public function redirectToPhorge()
	{
		return Socialite::driver('phorge')->redirect();
	}

	/**
	 * Obtain the user information from Phabricator
	 *
	 * return Illuminate\Http\Response
	 */
	public function handlePhorgeCallback()
    {
        try {
	        $user = Socialite::driver('phorge')->user();
            Auth::login($user);
            Session::regenerate();
        }
        catch (InvalidStateException $e) {
            Log::Warning("Invalid OAuth2 login state: {$e->getMessage()}");
        }
	    return redirect()->intended('/');
    }
}
