<?php

namespace App\Http\Controllers\User;

use App\Models\EmergencyCase;
use App\Http\Controllers\Controller;
use App\Models\Medicine;
use App\Http\Requests\User\UpsertEmergencyCaseRequest;
use Illuminate\Support\Facades\DB;

class EmergencyCaseController extends Controller
{

	public function index()
	{
		return response()->json(EmergencyCase::with(['patient.department', 'medicine', 'nurse'])->get());
	}

	public function store(UpsertEmergencyCaseRequest $request)
	{
		$data = DB::transaction(function () use ($request) {
			$emergencyCase = EmergencyCase::create($request->all());

			$medicine = Medicine::findOrFail($request['medicine_id']);
			$medicine->quantity -= $request['quantity'];
			$medicine->save();

			$emergencyCase->load(['patient.department', 'medicine', 'nurse']);

			return $emergencyCase;
		});

		return response()->json($data);
	}

	public function show(int $id)
	{
		return response()->json(EmergencyCase::with(['patient.department', 'medicine', 'nurse'])->findOrFail($id));
	}

	public function destroy(int $id)
	{
		return response()->json(EmergencyCase::findOrFail($id));
	}
}
