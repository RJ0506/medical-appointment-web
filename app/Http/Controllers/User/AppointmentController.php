<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
	public function appointments(Request $request, int $serviceCategoryID)
	{
		$rows = Appointment::with('schedule.service_type.category', 'patient')->whereRelation('schedule.service_type.category', function ($query) use ($serviceCategoryID) {

			$query->where('id', $serviceCategoryID);
		});

		if ($request->filled('actions') && is_array($request->query('actions')))
			$rows->whereIn('status', $request->query('actions'));

		$rows = $rows->orderBy('created_at', 'desc')->get();

		return response()->json($rows);

	}

	public function updateStatus(Request $request, int $appointmentID)
	{
		$request->validate([
			'action' => 'required|in:Checked In,Cancelled',
		]);

		$row = Appointment::where('status', 'Pending')->findOrFail($appointmentID);
		$row->status = $request->action;
		$row->save();

		return response()->json($row);
	}
}
