<?php

namespace App\Http\Controllers\User;

use App\Models\ServiceType;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpsertServiceTypeRequest;
use Illuminate\Http\Request;

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
		return response()->json(ServiceType::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpsertServiceTypeRequest $request, string $id)
	{
		$row = ServiceType::find($id);

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
		$row = ServiceType::find($id);

		if (!$row) {
			return response()->json('No data found.', 404);
		}

		return response()->json($row->delete());

	}
}
