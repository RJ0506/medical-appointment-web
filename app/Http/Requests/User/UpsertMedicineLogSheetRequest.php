<?php

namespace App\Http\Requests\User;

use App\Rules\HasMedicineStock;
use App\Rules\HasUserRoles;
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
			'medicine_id' => ['required', 'exists:medicines,id', new HasMedicineStock],
			"chief_complaint" => "required|min:2",
			"quantity" => "required|gt:0",
			"nurse_id" => ["required", "exists:users,id", new HasUserRoles(['Head Nurse', 'Nurse'])],
		];
	}
}
