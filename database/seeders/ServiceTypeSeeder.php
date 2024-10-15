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
			[
				'name' => 'Checkup',
				'service_category_id' => 1
			],
			[
				'name' => 'Vaccination',
				'service_category_id' => 1
			],
			[
				'name' => 'Cleaning',
				'service_category_id' => 2
			],
			[
				'name' => 'Pasta',
				'service_category_id' => 2
			],
			[
				'name' => 'Tooth Extraction',
				'service_category_id' => 2
			],
		];

		foreach ($serviceTypes as $serviceType)
			ServiceType::create($serviceType);
	}
}
