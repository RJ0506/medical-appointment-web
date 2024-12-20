<?php

namespace App\Http\Requests\User;

use App\Rules\HasMedicineStock;
use App\Rules\HasUserRoles;
use Illuminate\Foundation\Http\FormRequest;

class UpsertEmergencyCaseRequest extends FormRequest
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
			"quantity" => "required|gt:0",
			"chief_complaint" => "required|min:2",
			"treatment_given" => "required|min:2",
			'patient_id' => 'required|exists:patients,id',
			"nurse_id" => ["required", "exists:users,id", new HasUserRoles(['Head Nurse', 'Medical Nurse', 'Dental Nurse'])],
			'medicine_id' => ['required', 'exists:medicines,id', new HasMedicineStock],
		];
	}
}
