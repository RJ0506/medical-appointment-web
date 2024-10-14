<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;
class PatientSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		Patient::factory(2)
			->create()
			->each(function ($patient) {
				$patient->assignRole('Doctor');
			});

		Patient::factory(2)
			->create()
			->each(function ($patient) {
				$patient->assignRole('Doctor');
			});
	}
}
