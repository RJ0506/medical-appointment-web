<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class PatientRegisterRequest extends FormRequest
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
			"type" => "required|in:Student,Employee",
			"id_number" => "required|min:2|unique:patients,id_number",
			"first_name" => "required|min:2",
			"middle_initial" => "nullable|max:1|uppercase",
			"last_name" => "required|min:2",
			"email" => "required|email|unique:patients,email",
			"password" => ["required", "confirmed", Password::min(8)->mixedCase()->numbers()->uncompromised()],
			"place_of_birth" => "nullable",
			"date_of_birth" => "required|date",
			"gender" => "required|in:Male,Female",
			"contact_number" => "required|min:11|unique:patients,contact_number",
			"contact_person" => "required|min:5",
			"nationality" => "required|min:3",
			"address" => "required|min:2",
			"zip_code" => "nullable",
			"name_extension" => "nullable",
			//Student fields
			"year_level" => 'required_if:type,Student|prohibited_if:type,Employee|in:1st,2nd,3rd,4th',
			"course" => 'required_if:type,Student|prohibited_if:type,Employee|min:2',
			//Employee fields 
			"relation" => 'prohibited_if:type,Student|nullable',
			"department" => 'required_if:type,Employee|prohibited_if:type,Student|min:2',
			"accountability" => 'required_if:type,Employee|prohibited_if:type,Student|min:2'
		];
	}
}
