<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpsertRoleRequest;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
	public function index()
	{
		return response()->json(Role::all());
	}

	public function store(UpsertRoleRequest $request)
	{
		return response()->json(
			Role::
				create(
					$request->all() + ['guard_name' => 'api']
				)
		);
	}
	public function show(int $id)
	{
		return response()->json(Role::findOrFail($id));
	}
	public function update(UpsertRoleRequest $request, int $id)
	{
		$row = Role::findOrFail($id);
		$row->update($request->all());

		return response()->json($row);
	}
	public function destroy(int $id)
	{
		$row = Role::findOrFail($id);

		return response()->json($row->delete());
	}
}
