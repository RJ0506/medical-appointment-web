<?php

use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\Patient\AuthController as PatientAuthController;
use App\Http\Controllers\User\AppointmentScheduleController;
use App\Http\Controllers\User\MedicineCategoryController;
use App\Http\Controllers\User\MedicineInventoryController;
use App\Http\Controllers\User\ServiceCategoryController;
use App\Http\Controllers\User\ServiceTypeController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function () {
	Route::post('/login', [UserAuthController::class, 'login']);

	Route::middleware(['auth:sanctum', 'token_name:user-token'])->group(function () {
		Route::post('/logout', [UserAuthController::class, 'logout']);
		Route::get('/me', [UserAuthController::class, 'me']);

		Route::resources([
			'service-types' => ServiceTypeController::class,
			'service-categories' => ServiceCategoryController::class,
			'medicine-categories' => MedicineCategoryController::class,
			'medicine-inventories' => MedicineInventoryController::class,
			'appointment-schedules' => AppointmentScheduleController::class,
		]);
	});
});

Route::prefix('patient')->group(function () {
	Route::post('/register', [PatientAuthController::class, 'register']);
	Route::post('/login', [PatientAuthController::class, 'login']);

	Route::middleware(['auth:sanctum', 'token_name:patient-token'])->group(function () {
		Route::post('/logout', [PatientAuthController::class, 'logout']);
		Route::get('/me', [PatientAuthController::class, 'me']);
	});
});
