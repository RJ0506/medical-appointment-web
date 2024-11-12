<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Patient;

class PatientController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return response()->json(Patient::all());
	}

	public function show(int $id)
	{
		return response()->json(Patient::findOrFail($id));
	}
}
