<?php

use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\User\ServiceCategoryController;
use App\Http\Controllers\User\ServiceTypeController;
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
		Route::resources([
			'service-types' => ServiceTypeController::class,
			'service-categories' => ServiceCategoryController::class
		]);
	});

});

//