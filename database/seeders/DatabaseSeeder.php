<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Appointment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		$this->call([
			RoleAndPermissionSeeder::class,
			ServiceCategorySeeder::class,
			ServiceTypeSeeder::class,
			DepartmentSeeder::class,
			UserSeeder::class,
			PatientSeeder::class,
			AppointmentScheduleSeeder::class,
		]);
	}
}
