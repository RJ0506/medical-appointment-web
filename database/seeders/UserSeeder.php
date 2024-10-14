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
				$user->assignRole('Doctor');
			});
	}
}
