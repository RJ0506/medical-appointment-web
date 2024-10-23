<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$serviceTypes = [
			'Medical',
			'Dental'
		];

		foreach ($serviceTypes as $serviceType)
			ServiceCategory::create(['name' => $serviceType]);
	}
}
