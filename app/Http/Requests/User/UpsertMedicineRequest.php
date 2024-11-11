<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpsertMedicineRequest extends FormRequest
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
			"medicine_category" => "required|string",
			"generic_name" => "required|min:3",
			"brand_name" => "nullable|min:2",
			"dosage" => "required|min:2",
			"quantity" => "required|numeric",
			"expiration_date" => "required|date",
		];
	}
}
