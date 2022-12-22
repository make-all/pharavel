<?php

use Illuminate\Support\Facades\Route;
use Pharavel\Socialite\LoginController;

Route::get('/auth/phorge/redirect', [LoginController::class, 'redirectToPhorge'])->middleware('web')->name('phorgeLogin');

Route::get('/auth/phorge/callback', [LoginController::class, 'handlePhorgeCallback'])->middleware('web');
