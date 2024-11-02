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
			'place_of_birth' => fake()->city(),
			'date_of_birth' => fake()->date(),
			'gender' => fake()->randomElement(['Male', 'Female']),
			'address' => fake()->address(),
			'contact_number' => fake()->mobileNumber(),
			'contact_person' => fake()->name(),
			'contact_person_number' => fake()->mobileNumber(),
			'nationality' => 'Filipino',
		];
	}
}
