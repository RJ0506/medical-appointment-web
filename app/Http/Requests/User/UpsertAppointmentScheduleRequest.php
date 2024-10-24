<?php

namespace App\Http\Requests\User;

use App\Rules\IsDoctor;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UpsertAppointmentScheduleRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		$now = Carbon::now()->timezone('Asia/Manila');

		return [
			"start_date" => "required|date_format:Y-m-d H:i:s|after:$now",
			"end_date" => "nullable|date_format:Y-m-d H:i:s|after:start_date",
			"doctor_id" => ["required", "exists:users,id", new IsDoctor],
			"service_type_id" => "required|exists:service_types,id",
		];
	}
}
