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
		return response()->json(ServiceCategory::findOrFail($id));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpsertServiceCategoryRequest $request, string $id)
	{
		$row = ServiceCategory::findOrFail($id);
		$row->update($request->all());

		return response()->json($row);
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(int $id)
	{
		$row = ServiceCategory::findOrFail($id);

		return response()->json($row->delete());

	}
}
