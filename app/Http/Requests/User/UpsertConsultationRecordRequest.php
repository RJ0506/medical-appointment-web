<?php

namespace App\Http\Requests\User;

use App\Models\ServiceCategory;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpsertConsultationRecordRequest extends FormRequest
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
			"patient_id" => "required|exists:patients,id",
			"service_category_id" => "required|exists:service_categories,id",
			"complaints" => "required|max:255",
			"treatment" => [
				Rule::requiredIf(function () {
					$serviceCategory = ServiceCategory::findOrFail($this->service_category_id);

					return $serviceCategory->name === 'Medical';
				}),
				"string"
			],
			"tooth_count" => [
				Rule::requiredIf(function () {
					$serviceCategory = ServiceCategory::findOrFail($this->service_category_id);

					return $serviceCategory->name === 'Dental';
				}),
				"integer"
			],
			"diagnosis" => [
				Rule::requiredIf(function () {
					$serviceCategory = ServiceCategory::findOrFail($this->service_category_id);

					return $serviceCategory->name === 'Dental';
				}),
				"string"
			],
		];
	}
}
