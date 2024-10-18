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
		$rows = [
			'Medical',
			'Dental'
		];

		foreach ($rows as $row)
			ServiceCategory::create(['name' => $row]);
	}
}
