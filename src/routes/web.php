<?php

use Illuminate\Support\Facades\Route;
use Pharavel\Socialite\LoginController;

Route::get('/auth/phorge/redirect', [LoginController::class, 'redirectToPhorge'])->name('phorgeLogin');

Route::get('/auth/phorge/callback', [LoginController::class, 'handlePhorgeCallback']);
