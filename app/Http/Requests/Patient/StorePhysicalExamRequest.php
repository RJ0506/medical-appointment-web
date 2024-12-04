<?php

namespace App\Http\Requests\Patient;

use App\Models\Patient;
use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class StorePhysicalExamRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		$patient = Patient::findOrFail(auth()->user()->id);
		return $patient->hasRole('Employee');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		$now = Carbon::now()->timezone('Asia/Manila');
		return [
			'purpose' => 'required|string',
			'scheduled_date' => "required|date|after:$now",
			'time_slot' => 'required|string',
		];
	}
}
