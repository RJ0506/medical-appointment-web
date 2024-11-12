<?php

namespace App\Rules;

use App\Models\Medicine;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class HasMedicineStock implements ValidationRule, DataAwareRule
{
	/**
	 * Run the validation rule.
	 *
	 * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
	 */

	protected $data = [];

	public function validate(string $attribute, mixed $value, Closure $fail): void
	{
		$medicine = Medicine::findOrFail($value);

		if ($medicine->quantity < $this->data['quantity'])
			$fail('The medicine does not have enough stock left.');
	}

	public function setData(array $data): static
	{
		$this->data = $data;

		return $this;
	}
}
