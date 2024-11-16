<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\Department;
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
				$patient->assignRole('Student');

				$randomDepartment = Department::inRandomOrder()->first();
				$patient->department()->associate($randomDepartment);
				$patient->save();
			});

		Patient::factory(2)
			->create()
			->each(function ($patient) {
				$patient->assignRole('Employee');

				$randomDepartment = Department::inRandomOrder()->first();
				$patient->department()->associate($randomDepartment);
				$patient->save();
			});

		Patient::factory(2)
			->create()
			->each(function ($patient) {
				$patient->assignRole('Medical Personnel');
			});
	}
}
