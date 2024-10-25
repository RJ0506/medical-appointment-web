<?php

namespace Database\Seeders;

use App\Models\MedicineCategory;
use Illuminate\Database\Seeder;

class MedicineCategorySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$medicineCategories = [
			'Vaccine',
		];

		foreach ($medicineCategories as $medicineCategory)
			MedicineCategory::create(['name' => $medicineCategory]);
	}
}
