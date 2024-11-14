<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class SearchAppointmentScheduleRequest extends FormRequest
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
			"service_type_id" => "required|exists:service_types,id",
			"date" => "required|date|after:$now",
		];
	}

	public function messages(): array
	{
		return [
			'date.after' => 'The date must not be an old date'
		];
	}
}
