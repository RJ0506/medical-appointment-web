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
		return [
			"day_of_week" => "required|in:Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday",
			"start_time" => "required|date_format:H:i",
			"end_time" => "required|date_format:H:i|after:start_time",
			"doctor_id" => ["required", "exists:users,id", new IsDoctor],
			"service_type_id" => "required|exists:service_types,id",
		];
	}

	public function messages(): array
	{
		return [
			'end_time.after' => 'End time must be after start time.',
		];
	}
}
