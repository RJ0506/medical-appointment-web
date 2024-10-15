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
			$table->dateTime('start_date');
			$table->dateTime('end_date')->nullable();
			$table->foreignId('service_type_id')->constrained();
			$table->foreignId('patient_id')->constrained();
			$table->foreignId('doctor_id')->nullable()->constrained('users');
			$table->enum('status', ['Confirmed', 'Completed', 'Pending', 'Canceled', 'Rescheduled', 'No-show']);
			$table->timestamps();
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
