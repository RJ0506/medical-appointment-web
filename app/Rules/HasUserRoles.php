<?php

namespace App\Rules;

use Closure;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;

class HasUserRoles implements ValidationRule
{
	/**
	 * Run the validation rule.
	 *
	 * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
	 */
	protected array $roles;

	public function __construct(array $roles)
	{
		$this->roles = $roles;
	}
	public function validate(string $attribute, mixed $value, Closure $fail): void
	{
		$user = User::findOrFail($value);

		if (!$user->hasAnyRole($this->roles)) {
			$rolesString = implode(', ', $this->roles);
			$fail('The :attribute role has to be: ' . $rolesString);
		}
	}
}
