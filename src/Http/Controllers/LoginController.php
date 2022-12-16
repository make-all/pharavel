<?php

namespace Pharavel\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller;
use Laravel\Socialite\Facades\Socialite;

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
	    $user = Socialite::driver('phorge')->user();
        \Log::debug("User: $user");
        Auth::login($user);
        Session::regenerate();
		return redirect()->intended('/');
	}
}
