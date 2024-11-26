<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpsertUserRequest;

class UserController extends Controller
{
	public function index()
	{
		return response()->json(User::with('roles')->get());
	}

	public function store(UpsertUserRequest $request)
	{
		return response()->json(User::create($request->all()));
	}

	public function show(int $id)
	{
		return response()->json(User::with('roles')->findOrFail($id));
	}

	public function update(UpsertUserRequest $request, int $id)
	{
		$row = User::findOrFail($id);
		$row->update($request->all());

		return response()->json($row);
	}

	public function destroy(int $id)
	{
		$row = User::findOrFail($id);

		return response()->json($row->delete());
	}
}
