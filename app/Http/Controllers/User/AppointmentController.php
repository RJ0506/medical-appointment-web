<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Appointment;

class AppointmentController extends Controller
{
	public function appointments(int $serviceCategoryID)
	{
		$rows = Appointment::with('schedule.service_type.category', 'patient')->whereRelation('schedule.service_type.category', function ($query) use ($serviceCategoryID) {

			$query->where('id', $serviceCategoryID);
		})->orderBy('created_at', 'desc')->get();

		return response()->json($rows);
	}
}
