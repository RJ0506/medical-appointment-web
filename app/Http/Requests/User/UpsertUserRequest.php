<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpsertUserRequest extends FormRequest
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
		$rules = [
			"first_name" => "required|min:2",
			"middle_name" => "nullable|min:2",
			"last_name" => "required|min:2",
			"email" => "required|email|unique:users,email,",
			"password" => ["required", "confirmed", Password::min(8)->mixedCase()->numbers()->uncompromised()],
			"role_id" => "required|exists:roles,id",
		];

		if ($this->method() === 'PUT' || $this->method() === 'PATCH') {
			$explodedPaths = explode('/', $this->path());
			$routeParam = $explodedPaths[count($explodedPaths) - 1];

			$rules['email'] .= $routeParam;
		}

		return $rules;
	}
}
