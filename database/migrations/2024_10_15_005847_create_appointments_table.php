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
		Schema::create('appointments', function (Blueprint $table) {
			$table->id();
			$table->foreignId('appointment_schedule_id')->constrained();
			$table->foreignId('patient_id')->constrained();
			$table->enum('status', ['Confirmed', 'Completed', 'Pending', 'Canceled', 'Rescheduled', 'No-show', 'Open'])->default('Pending');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('appointments');
	}
};
