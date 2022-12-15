<?php

namespace Pharavel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;

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
		Auth::login($user);
		return redirect()->intended(action('HomeController@index'));
	}
}
