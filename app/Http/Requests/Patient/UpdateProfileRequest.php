<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
			"id_number" => "prohibited",
			"email" => "prohibited",
			"password" => "prohibited      ",
			"first_name" => "required|min:2",
			"middle_initial" => "nullable|max:1|uppercase",
			"last_name" => "required|min:2",
			"place_of_birth" => "nullable",
			"date_of_birth" => "required|date",
			"gender" => "required|in:Male,Female",
			"contact_number" => "required|min:11|unique:patients,contact_number",
			"contact_person" => "required|min:5",
			"contact_person_number" => "required|min:11",
			"nationality" => "required|min:3",
			"address" => "required|min:2",
			"zip_code" => "nullable",
			"name_extension" => "nullable",
			"relation" => "nullable",
			//Student fields
			"year_level" => [
				Rule::requiredIf(function () {
					return auth()->user()->hasRole("Student");
				}),
				Rule::prohibitedIf(function () {
					return !auth()->user()->hasRole("Student");
				}),
				'in:1st,2nd,3rd,4th'
			],
			"department_id" => [
				Rule::requiredIf(function () {
					return auth()->user()->hasAnyRole(["Student", "Employee"]);
				}),
				Rule::prohibitedIf(function () {
					return !auth()->user()->hasAnyRole(["Student", "Employee"]);
				}),
				'exists:departments,id'
			],
			//Employee fields 
			"classification" => [
				Rule::requiredIf(function () {
					return auth()->user()->hasRole("Employee");
				}),
				Rule::prohibitedIf(function () {
					return !auth()->user()->hasRole("Employee");
				}),
				'in:Dean,Professor,Employee,Faculty',
			],
			//Medical Personnel Fields
			"profession" => [
				Rule::requiredIf(function () {
					return auth()->user()->hasRole("Medical Personnel");
				}),
				Rule::prohibitedIf(function () {
					return !auth()->user()->hasRole("Medical Personnel");
				}),
				'in:Doctor,Head Nurse,Nurse',
			],
		];
	}
}
