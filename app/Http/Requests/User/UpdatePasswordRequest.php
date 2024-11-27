<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Closure;

class UpdatePasswordRequest extends FormRequest
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
			"current_password" => [
				"required",
				"string",
				function (string $attribute, mixed $value, Closure $fail) {
					$patient = User::findOrFail(auth()->user()->id);

					if (!Hash::check($value, $patient->password)) {
						$fail("Your password is incorrect.");
					}
				},
			],
			"password" => ["required", "confirmed", Password::min(8)->mixedCase()->numbers()->uncompromised()],
		];
	}
}
