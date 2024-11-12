<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpsertMedicineLogSheetRequest extends FormRequest
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
			'patient_id' => 'required|exists:patients,id',
			'medicine_id' => 'required|exists:medicines,id',
			"chief_complaint" => "required|min:2",
			"quantity" => "required|numeric",
			"nurse_on_duty" => "required|min:2",
		];
	}
}
