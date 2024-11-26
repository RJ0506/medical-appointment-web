<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Patient\PatientRegisterRequest;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
use Exception;

class AuthController extends Controller
{

	public function departments()
	{
		return response()->json(Department::all());
	}
	public function register(PatientRegisterRequest $request)
	{
		try {
			DB::beginTransaction();
			$patient = Patient::create($request->all());
			$patient->assignRole($request['type']);

			Auth::login($patient);

			$uAuth = auth()->user();
			$uAuth->tokens()->delete();
			$token = $uAuth->createToken('patient-token')->plainTextToken;

			DB::commit();
			return response([
				'patient' => $patient,
				'token' => $token
			]);
		} catch (Exception $e) {
			DB::rollBack();
			return response('Something went wrong. Please try again later!', 500);
		}
	}

	public function login(Request $request)
	{
		$request->validate([
			'email' => 'required|email',
			'password' => 'required|min:3',
		]);

		$patient = Patient::where('email', $request->email)->first();

		if (!$patient || !Hash::check($request->password, $patient->password)) {
			return response('The provided credentials are incorrect', 401);
		}

		Auth::login($patient);

		$uAuth = auth()->user();
		$uAuth->tokens()->delete();
		$token = $uAuth->createToken('patient-token')->plainTextToken;

		return response([
			'patient' => $patient,
			'token' => $token
		]);
	}

	public function logout()
	{
		auth()->user()->tokens()->delete();
		return response('Successfully logged out!', 200);
	}
	public function me()
	{
		return response()->json(Patient::with('roles', 'department')->findOrFail(auth()->user()->id));
	}
}
