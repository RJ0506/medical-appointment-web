<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\UpdatePasswordRequest;
use App\Http\Requests\Patient\UpdateProfileRequest;
use App\Models\Patient;

class ProfileController extends Controller
{
	public function update(UpdateProfileRequest $request)
	{
		$row = Patient::findOrFail(auth()->user()->id);
		$row->update($request->all());
		$row->load(['roles']);

		return response()->json($row);
	}

	public function changePassword(UpdatePasswordRequest $request)
	{
		$row = Patient::findOrFail(auth()->user()->id);
		$row->password = $request->password;
		$row->save();

		return response('Password successfully changed.');
	}
}