<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('appointment_schedules', function (Blueprint $table) {
			$table->id();
			$table->dateTime('start_date');
			$table->dateTime('end_date')->nullable();
			$table->foreignId('doctor_id')->constrained('users');
			$table->foreignId('service_type_id')->constrained();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('appointment_schedules');
	}
};
