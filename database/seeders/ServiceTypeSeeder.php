<?php

namespace Database\Seeders;

use App\Models\ServiceType;
use Illuminate\Database\Seeder;

class ServiceTypeSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$serviceTypes = [
			'Checkup',
			'Vaccination',
			'Cleaning',
			'Pasta',
			'Tooth Extraction'
		];

		foreach ($serviceTypes as $serviceType)
			ServiceType::create(['name' => $serviceType]);
	}
}
