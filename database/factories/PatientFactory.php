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
		fake()->addProvider(new \Faker\Provider\en_PH\PhoneNumber(fake()));
		return [
			'id_number' => fake()->uuid(),
			'first_name' => fake()->firstName(),
			'middle_initial' => strtoupper(fake()->randomLetter()),
			'last_name' => fake()->lastName(),
			'email' => fake()->unique()->safeEmail(),
			'password' => static::$password ??= Hash::make('password'),
			'date_of_birth' => fake()->date(),
			'gender' => fake()->randomElement(['Male', 'Female']),
			'address' => fake()->address(),
			'contact_number' => fake()->mobileNumber(),
			'contact_person' => fake()->name(),
			'nationality' => 'Filipino',
			'year_level' => fake()->randomElement(['1st', '2nd', '3rd', '4th']),
			'course' => fake()->randomElement(['BSIT', 'BSBA', 'BSENT', 'BSCOMSCI']),
			'department' => fake()->randomElement(['IT', 'Accounting', 'HR']),
		];
	}
}
