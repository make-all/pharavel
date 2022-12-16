<?php

namespace Pharavel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Socialite;

class LoginController extends Controller
{
    /**
	 * Redirect the user to the Phabricator authentication page
	 *
	 * @return Illuminate\Http\Response
	 */
	public function redirectToPhorge(Request $request)
	{
		return Socialite::driver('phorge')->redirect();
	}

	/**
	 * Obtain the user information from Phabricator
	 *
	 * return Illuminate\Http\Response
	 */
	public function handlePhorgeCallback(Request $request)
	{
		$user = Socialite::driver('phorge')->user();
        Auth::login($user);
        Session::regenerate();
		return redirect()->intended('/');
	}
}
