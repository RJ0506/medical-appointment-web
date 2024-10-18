<?php

namespace Database\Seeders;

use App\Models\TimeSlot;
use Illuminate\Database\Seeder;

class TimeSlotSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$timeSlots = [
			'12:00:00',
			'12:20:00',
			'12:40:00',
			'01:20:00',
			'01:40:00',
		];

		foreach ($timeSlots as $row)
			TimeSlot::create(['time' => $row]);
	}
}
