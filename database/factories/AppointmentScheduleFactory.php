<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ServiceType;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AppointmentSchedule>
 */
class AppointmentScheduleFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'day_of_week' => fake()->dayOfWeek(),
			'start_time' => fake()->time('H:i'),
			'end_time' => fake()->time('H:i'),
			'service_type_id' => function () {
				return ServiceType::inRandomOrder()->first();
			},
			'doctor_id' => function () {
				return User::inRandomOrder()->role('Doctor')->first();
			},
		];
	}
}
