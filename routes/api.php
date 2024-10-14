<?php

use App\Http\Controllers\User\AuthController as UserAuthController;
use Illuminate\Support\Facades\Route;


Route::prefix('user')->group(function () {
	Route::controller(UserAuthController::class)->group(function () {
		Route::post('/login', 'login');

		Route::middleware(['auth:sanctum'])->group(function () {
			Route::post('/logout', [UserAuthController::class, 'logout']);
			Route::post('/me', [UserAuthController::class, 'me']);
		});
	});

	Route::middleware(['auth:sanctum'])->group(function () {

	});

});

//