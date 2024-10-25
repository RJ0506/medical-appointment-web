<?php

namespace App\Http\Controllers\User;

use App\Models\MedicineCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpsertMedicineCategoryRequest;

class MedicineCategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return response()->json(MedicineCategory::all());
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(UpsertMedicineCategoryRequest $request)
	{
		return response()->json(MedicineCategory::create($request->all()));
	}

	/**
	 * Display the specified resource.
	 */
	public function show(int $id)
	{
		return response()->json(MedicineCategory::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpsertMedicineCategoryRequest $request, string $id)
	{
		$row = MedicineCategory::find($id);

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
		$row = MedicineCategory::find($id);

		if (!$row) {
			return response()->json('No data found.', 404);
		}

		return response()->json($row->delete());

	}
}
