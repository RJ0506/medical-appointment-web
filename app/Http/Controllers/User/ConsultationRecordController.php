<?php

namespace App\Http\Controllers\User;

use App\Models\ConsultationRecord;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpsertConsultationRecordRequest;

class ConsultationRecordController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return response()->json(ConsultationRecord::all());
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(UpsertConsultationRecordRequest $request)
	{
		//Temporary guard check, must be replaced by Laravel Policy
		if (!auth()->user()->hasRole('Doctor'))
			return response('You are not a doctor to make this request', 403);

		return response()
			->json(
				ConsultationRecord::create(
					$request->all() +
					['doctor_id' => auth()->user()->id]
				)
			);
	}

	/**
	 * Display the specified resource.
	 */
	public function show(int $id)
	{
		return response()->json(ConsultationRecord::findOrFail($id));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpsertConsultationRecordRequest $request, int $id)
	{
		//Temporary guard check, must be replaced by Laravel Policy
		if (!auth()->user()->hasRole('Doctor'))
			return response('You are not a doctor to make this request', 403);

		$row = ConsultationRecord::findOrFail($id);
		$row->update($request->all());

		return response()->json($row);
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(int $id)
	{
		$row = ConsultationRecord::findOrFail($id);
		return response()->json($row->delete());
	}
}
