<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\SearchAppointmentScheduleRequest;
use App\Http\Requests\Patient\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\AppointmentSchedule;
use App\Models\ServiceCategory;
use App\Models\ServiceType;
use Carbon\Carbon;

class AppointmentController extends Controller
{

	public function index()
	{
		return response()->json(
			Appointment::
				with('schedule.doctor')
				->where('patient_id', auth()->user()->id)
				->orderBy('scheduled_date', 'desc')
				->get()
		);
	}

	public function store(StoreAppointmentRequest $request)
	{
		$dayOfWeek = $this->getDayOfWeek($request['date']);

		$appointmentSchedule = AppointmentSchedule::
			where('day_of_week', $dayOfWeek)
			->where('service_type_id', $request['service_type_id'])
			->where('start_time', $request['time'])
			->first();

		if (!$appointmentSchedule)
			return response('No appointment schedule found.', 404);

		$appointment = Appointment::create([
			'appointment_schedule_id' => $appointmentSchedule->id,
			'patient_id' => auth()->user()->id,
			'scheduled_date' => $request['date'],
		]);

		return response()->json($appointment);
	}

	public function serviceCategories()
	{
		return response()->json(ServiceCategory::all());
	}

	public function serviceTypes(int $serviceCategoryID)
	{
		$rows = ServiceType::where('service_category_id', $serviceCategoryID)->get();

		return response()->json($rows);
	}

	public function schedules(SearchAppointmentScheduleRequest $request)
	{
		$dayOfWeek = $this->getDayOfWeek($request->query('date'));

		$rows = AppointmentSchedule::
			where('day_of_week', $dayOfWeek)
			->where('service_type_id', $request->query('service_type_id'))
			->get();

		return response()->json($rows);
	}

	private function getDayOfWeek(string $date)
	{
		return Carbon::parse($date)->format('l');
	}
}
