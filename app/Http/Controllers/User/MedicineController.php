<?php

namespace App\Http\Controllers\User;

use App\Models\Medicine;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpsertMedicineRequest;

class MedicineController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return response()->json(Medicine::all());
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(UpsertMedicineRequest $request)
	{
		return response()->json(Medicine::create($request->all()));
	}

	/**
	 * Display the specified resource.
	 */
	public function show(int $id)
	{
		return response()->json(Medicine::findOrFail($id));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpsertMedicineRequest $request, int $id)
	{
		$row = Medicine::findOrFail($id);
		$row->update($request->all());

		return response()->json($row);
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(int $id)
	{
		$row = Medicine::findOrFail($id);

		return response()->json($row->delete());
	}
}
