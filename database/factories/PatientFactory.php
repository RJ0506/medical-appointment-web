<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
	protected static ?string $password;
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'first_name' => fake()->firstName(),
			'middle_name' => fake()->lastName(),
			'last_name' => fake()->lastName(),
			'email' => fake()->unique()->safeEmail(),
			'password' => static::$password ??= Hash::make('password'),
		];
	}
}
