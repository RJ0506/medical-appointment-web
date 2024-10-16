<?php

use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\User\MedicineInventoryController;
use App\Http\Controllers\User\ServiceCategoryController;
use App\Http\Controllers\User\ServiceTypeController;
use Illuminate\Support\Facades\Route;


Route::prefix('user')->group(function () {
	Route::post('/login', [UserAuthController::class, 'login']);

	Route::middleware(['auth:sanctum', 'token_name:user-token'])->group(function () {
		Route::post('/logout', [UserAuthController::class, 'logout']);
		Route::post('/me', [UserAuthController::class, 'me']);

		Route::resources([
			'service-types' => ServiceTypeController::class,
			'service-categories' => ServiceCategoryController::class,
			'medicine-inventories' => MedicineInventoryController::class
		]);
	});

});

//