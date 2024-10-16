<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
class UpsertServiceTypeRequest extends FormRequest
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
			"name" => "required|min:3|unique:service_types,name,",
			"description" => "nullable",
			"service_category_id" => "required|exists:service_categories,id",
		];

		if ($this->method() === 'PUT' || $this->method() === 'PATCH') {
			$explodedPaths = explode('/', $this->path());
			$routeParam = $explodedPaths[count($explodedPaths) - 1];

			$rules['name'] .= $routeParam;
		}

		return $rules;
	}
}
