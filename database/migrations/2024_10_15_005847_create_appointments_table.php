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
			$table->date('scheduled_date')->constrained();
			$table->foreignId('appointment_schedule_id')->constrained();
			$table->foreignId('patient_id')->constrained();
			$table->enum('status', ['Pending', 'Checked In', 'Cancelled'])->default('Pending');
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
