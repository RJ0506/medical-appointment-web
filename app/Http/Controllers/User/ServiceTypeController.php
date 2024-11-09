<?php

namespace App\Http\Controllers\User;

use App\Models\ServiceType;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpsertServiceTypeRequest;

class ServiceTypeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return response()->json(ServiceType::all());
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(UpsertServiceTypeRequest $request)
	{
		return response()->json(ServiceType::create($request->all()));
	}

	/**
	 * Display the specified resource.
	 */
	public function show(int $id)
	{
		return response()->json(ServiceType::findOrFail($id));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpsertServiceTypeRequest $request, string $id)
	{
		$row = ServiceType::findOrFail($id);
		$row->update($request->all());

		return response()->json($row);
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(int $id)
	{
		$row = ServiceType::findOrFail($id);

		return response()->json($row->delete());
	}
}
