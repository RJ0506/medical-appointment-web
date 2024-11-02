<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
			"service_type_id" => "required|exists:appointment_schedules,service_type_id",
			"datetime" => "required|date_format:Y-m-d H:i:s|exists:appointment_schedules,start_date",
			"medicine_id" => "nullable|exists:medicines,id",
		];
	}
}
