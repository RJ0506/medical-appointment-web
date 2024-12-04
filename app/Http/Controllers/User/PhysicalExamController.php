<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PhysicalExam;

class PhysicalExamController extends Controller
{
	public function index(Request $request)
	{
		$rows = PhysicalExam::with('patient.department');

		if ($request->filled('actions') && is_array($request->query('actions')))
			$rows->whereIn('status', $request->query('actions'));

		$rows = $rows->orderBy('created_at', 'desc')->get();

		return response()->json($rows);
	}

	public function updateStatus(Request $request, int $physicalExamID)
	{
		$request->validate([
			'action' => 'required|in:Checked In,Cancelled',
		]);

		$row = PhysicalExam::where('status', 'Pending')->findOrFail($physicalExamID);
		$row->status = $request->action;
		$row->save();

		return response()->json($row);
	}
}
