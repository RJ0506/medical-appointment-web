<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

	public function login(Request $request)
	{
		$request->validate([
			'email' => 'required|email',
			'password' => 'required|min:3',
		]);

		$user = User::with('roles')->where('email', $request->email)->first();

		if (!$user || !Hash::check($request->password, $user->password)) {
			return response('The provided credentials are incorrect', 401);
		}

		Auth::login($user);

		$uAuth = auth()->user();
		$uAuth->tokens()->delete();
		$token = $uAuth->createToken('user-token')->plainTextToken;

		return response([
			'user' => $user,
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
		return response()->json(User::with('roles')->findOrFail(auth()->user()->id));
	}
}
