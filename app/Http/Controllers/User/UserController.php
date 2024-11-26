<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpsertUserRequest;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
	public function index()
	{
		return response()->json(User::with('roles')->get());
	}

	public function store(UpsertUserRequest $request)
	{
		$data = DB::transaction(function () use ($request) {
			$row = User::create($request->all());
			$role = Role::findOrFail($request['role_id']);

			$row->assignRole($role);
			$row->load(['roles']);

			return $row;
		});

		return response()->json($data);
	}

	public function show(int $id)
	{
		return response()->json(User::with('roles')->findOrFail($id));
	}

	public function update(UpsertUserRequest $request, int $id)
	{
		$row = User::findOrFail($id);
		$row->update($request->all());
		$row->load(['roles']);

		return response()->json($row);
	}

	public function destroy(int $id)
	{
		$row = User::findOrFail($id);

		return response()->json($row->delete());
	}
}
