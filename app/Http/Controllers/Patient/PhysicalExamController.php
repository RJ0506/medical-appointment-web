<?php

namespace App\Http\Controllers\Patient;

use App\Models\PhysicalExam;
use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\StorePhysicalExamRequest;

class PhysicalExamController extends Controller
{
	public function store(StorePhysicalExamRequest $request)
	{
		return response()->json(
			PhysicalExam::
				create($request->all() + [
					'patient_id' => auth()->user()->id
				])
		);
	}
}
