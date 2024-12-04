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
		Schema::create('physical_exams', function (Blueprint $table) {
			$table->id();
			$table->date('scheduled_date')->constrained();
			$table->string('purpose');
			$table->string('time_slot');
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
		Schema::dropIfExists('physical_exams');
	}
};
