<?php

namespace App\Http\Controllers\User;

use App\Models\AppointmentSchedule;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpsertAppointmentScheduleRequest;

class AppointmentScheduleController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return response()->json(AppointmentSchedule::all());
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(UpsertAppointmentScheduleRequest $request)
	{
		return response()->json(AppointmentSchedule::create($request->all()));
	}

	/**
	 * Display the specified resource.
	 */
	public function show(int $id)
	{
		return response()->json(AppointmentSchedule::find($id));
	}


	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpsertAppointmentScheduleRequest $request, int $id)
	{
		$row = AppointmentSchedule::find($id);

		if (!$row) {
			return response()->json('No data found.', 404);
		}

		$row->update($request->all());

		return response()->json($row);
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(int $id)
	{
		$row = AppointmentSchedule::find($id);

		if (!$row) {
			return response()->json('No data found.', 404);
		}

		return response()->json($row->delete());
	}
}
