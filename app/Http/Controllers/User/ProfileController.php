<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Http\Requests\User\UpdatePasswordRequest;
use App\Models\User;

class ProfileController extends Controller
{
	public function update(UpdateProfileRequest $request)
	{
		$row = User::findOrFail(auth()->user()->id);
		$row->update($request->all());
		$row->load(['roles']);

		return response()->json($row);
	}

	public function changePassword(UpdatePasswordRequest $request)
	{
		$row = User::findOrFail(auth()->user()->id);
		$row->password = $request->password;
		$row->save();

		return response('Password successfully changed.');
	}
}
