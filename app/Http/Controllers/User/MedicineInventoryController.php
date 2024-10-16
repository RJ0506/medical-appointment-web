<?php

namespace App\Http\Controllers\User;

use App\Models\MedicineInventory;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpsertMedicineInventoryRequest;

class MedicineInventoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return response()->json(MedicineInventory::all());
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(UpsertMedicineInventoryRequest $request)
	{
		return response()->json(MedicineInventory::create($request->all()));
	}

	/**
	 * Display the specified resource.
	 */
	public function show(int $id)
	{
		return response()->json(MedicineInventory::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpsertMedicineInventoryRequest $request, int $id)
	{
		$row = MedicineInventory::find($id);

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
		$row = MedicineInventory::find($id);

		if (!$row) {
			return response()->json('No data found.', 404);
		}

		return response()->json($row->delete());
	}
}
