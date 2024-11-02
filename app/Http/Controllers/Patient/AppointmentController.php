<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\SearchAppointmentTimeSlotsRequest;
use App\Http\Requests\Patient\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\AppointmentSchedule;
use App\Models\ServiceCategory;
use App\Models\ServiceType;
use Carbon\Carbon;

class AppointmentController extends Controller
{
	public function store(StoreAppointmentRequest $request)
	{
		$appointmentSchedule = AppointmentSchedule::
			where('start_date', $request->datetime)
			->where('service_type_id', $request->service_type_id)
			->first();

		if (!$appointmentSchedule)
			return response('No appointment schedule found', 404);

		$appointment = Appointment::create([
			'appointment_schedule_id' => $appointmentSchedule->id,
			'patient_id' => auth()->user()->id,
		]);

		return response()->json($appointment);
	}

	public function serviceCategories()
	{
		return response()->json(ServiceCategory::all());
	}

	public function serviceTypes(Request $request)
	{
		$request->validate([
			"service_category_id" => "required|exists:service_categories,id"
		]);

		$rows = ServiceType::where('service_category_id', $request->query('service_category_id'))->get();

		return response()->json($rows);
	}

	public function timeSlots(SearchAppointmentTimeSlotsRequest $request)
	{
		$startDate = Carbon::parse($request->query('date'))->startOfDay()->format('Y-m-d H:i:s');
		$endDate = Carbon::parse($request->query('date'))->endOfDay()->format('Y-m-d H:i:s');

		$rows = AppointmentSchedule::
			whereBetween('start_date', [$startDate, $endDate])
			->where('service_type_id', $request->query('service_type_id'))
			->get();

		return response()->json($rows);
	}
}
