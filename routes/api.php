<?php

use App\Http\Controllers\User\MedicineLogSheetController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\Patient\AuthController as PatientAuthController;
use App\Http\Controllers\Patient\AppointmentController as PatientAppointmentController;
use App\Http\Controllers\User\AppointmentController as UserAppointmentController;
use App\Http\Controllers\User\AppointmentScheduleController;
use App\Http\Controllers\User\DepartmentController;
use App\Http\Controllers\User\MedicineController;
use App\Http\Controllers\User\ServiceCategoryController;
use App\Http\Controllers\User\ServiceTypeController;
use App\Http\Controllers\User\ConsultationRecordController;
use App\Http\Controllers\User\EmergencyCaseController;
use App\Http\Controllers\User\PatientController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function () {
	Route::post('/login', [UserAuthController::class, 'login']);

	Route::middleware(['auth:sanctum', 'token_name:user-token'])->group(function () {
		Route::post('/logout', [UserAuthController::class, 'logout']);
		Route::get('/me', [UserAuthController::class, 'me']);

		Route::apiResources([
			'departments' => DepartmentController::class,
			'service-types' => ServiceTypeController::class,
			'service-categories' => ServiceCategoryController::class,
			'medicines' => MedicineController::class,
			'appointment-schedules' => AppointmentScheduleController::class,
			'consultation-records' => ConsultationRecordController::class,
		]);

		Route::prefix('appointments')->controller(UserAppointmentController::class)->group(function () {
			Route::get('/{service_category_id}', 'appointments');
			Route::patch('status/{appointment_id}', 'updateStatus');
		});

		Route::apiResource('patients', PatientController::class)->except([
			'store',
			'update',
			'destroy'
		]);

		Route::apiResource('medicine-log-sheets', MedicineLogSheetController::class)->except([
			'update',
		]);

		Route::apiResource('emergency-cases', EmergencyCaseController::class)->except([
			'update',
		]);
	});
});

Route::prefix('patient')->group(function () {
	Route::get('/departments', [PatientAuthController::class, 'departments']);
	Route::post('/register', [PatientAuthController::class, 'register']);
	Route::post('/login', [PatientAuthController::class, 'login']);

	Route::middleware(['auth:sanctum', 'token_name:patient-token'])->group(function () {
		Route::post('/logout', [PatientAuthController::class, 'logout']);
		Route::get('/me', [PatientAuthController::class, 'me']);

		Route::prefix('appointments')->controller(PatientAppointmentController::class)->group(function () {
			Route::get('/', 'index');
			Route::post('/', 'store');
			Route::get('/service-categories', 'serviceCategories');
			Route::get('/service-types/{service_category_id}', 'serviceTypes');
			Route::get('/schedules', 'schedules');
		});
	});
});
