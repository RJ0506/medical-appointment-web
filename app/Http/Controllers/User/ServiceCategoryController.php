<?php

namespace App\Http\Controllers\User;

use App\Models\ServiceCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpsertServiceCategoryRequest;

class ServiceCategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return response()->json(ServiceCategory::all());
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(UpsertServiceCategoryRequest $request)
	{
		return response()->json(ServiceCategory::create($request->all()));
	}

	/**
	 * Display the specified resource.
	 */
	public function show(int $id)
	{
		return response()->json(ServiceCategory::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpsertServiceCategoryRequest $request, string $id)
	{
		$row = ServiceCategory::find($id);

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
		$row = ServiceCategory::find($id);

		if (!$row) {
			return response()->json('No data found.', 404);
		}

		return response()->json($row->delete());

	}
}
