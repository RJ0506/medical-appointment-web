<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		User::factory(2)
			->create()
			->each(function ($user) {
				$user->assignRole('Super Admin');
			});

		User::factory(5)
			->create()
			->each(function ($user) {
				$user->assignRole('Medical Doctor');
			});

		User::factory(5)
			->create()
			->each(function ($user) {
				$user->assignRole('Dental Doctor');
			});

		User::factory(2)
			->create()
			->each(function ($user) {
				$user->assignRole('Head Nurse');
			});

		User::factory(5)
			->create()
			->each(function ($user) {
				$user->assignRole('Medical Nurse');
			});

		User::factory(5)
			->create()
			->each(function ($user) {
				$user->assignRole('Dental Nurse');
			});
	}
}
