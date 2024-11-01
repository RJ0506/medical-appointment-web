<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$departments = [
			['name' => 'College of Allied Health Sciences', 'acronym' => 'CAHS'],
			['name' => 'College of Arts, Sciences and Education', 'acronym' => 'CASE'],
			['name' => 'College of Engineering and Information Sciences', 'acronym' => 'CEIS'],
			['name' => 'College of Institute of Business Management', 'acronym' => 'CIBM'],
			['name' => 'College of Medical Technology', 'acronym' => 'CMT'],
			['name' => "St. Luke's College of Nursing", 'acronym' => 'SLCN'],
		];

		foreach ($departments as $department)
			Department::create($department);
	}
}
