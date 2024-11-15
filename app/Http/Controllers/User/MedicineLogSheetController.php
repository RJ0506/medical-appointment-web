<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UpsertMedicineLogSheetRequest;
use App\Models\Medicine;
use App\Http\Controllers\Controller;
use App\Models\MedicineLogSheet;
use Illuminate\Support\Facades\DB;

class MedicineLogSheetController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return response()->json(MedicineLogSheet::with(['patient.department', 'medicine'])->get());
	}
	/**
	 * Store a newly created resource in storage.
	 */
	public function store(UpsertMedicineLogSheetRequest $request)
	{
		$data = DB::transaction(function () use ($request) {
			$medicineLogSheet = MedicineLogSheet::create($request->all());

			$medicine = Medicine::findOrFail($request['medicine_id']);
			$medicine->quantity -= $request['quantity'];
			$medicine->save();

			$medicineLogSheet->load(['patient.department', 'medicine']);

			return $medicineLogSheet;
		});

		return response()->json($data);
	}

	/**
	 * Display the specified resource.
	 */
	public function show(int $id)
	{
		return response()->json(MedicineLogSheet::with(['patient.department', 'medicine'])->findOrFail($id));
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(int $id)
	{
		return response()->json(MedicineLogSheet::with(['patient.department', 'medicine'])->findOrFail($id));
	}
}
