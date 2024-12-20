<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UpsertDepartmentRequest;
use App\Http\Controllers\Controller;
use App\Models\Department;

class DepartmentController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return response()->json(Department::all());
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(UpsertDepartmentRequest $request)
	{
		return response()->json(Department::create($request->all()));
	}

	/**
	 * Display the specified resource.
	 */
	public function show(int $id)
	{
		return response()->json(Department::findOrFail($id));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpsertDepartmentRequest $request, string $id)
	{
		$row = Department::findOrFail($id);
		$row->update($request->all());

		return response()->json($row);
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(int $id)
	{
		$row = Department::findOrFail($id);

		return response()->json($row->delete());
	}
}
