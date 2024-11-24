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
		return response()->json(AppointmentSchedule::with(['doctor', 'service_type'])->get());
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(UpsertAppointmentScheduleRequest $request)
	{
		$row = AppointmentSchedule::create($request->all());
		$row->load(['doctor', 'service_type']);
		return response()->json($row);
	}

	/**
	 * Display the specified resource.
	 */
	public function show(int $id)
	{
		return response()->json(AppointmentSchedule::with(['doctor', 'service_type'])->findOrFail($id));
	}


	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpsertAppointmentScheduleRequest $request, int $id)
	{
		$row = AppointmentSchedule::findOrFail($id);
		$row->update($request->all());
		$row->load(['doctor', 'service_type']);

		return response()->json($row);
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(int $id)
	{
		$row = AppointmentSchedule::findOrFail($id);

		return response()->json($row->delete());
	}
}
