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
		Schema::create('emergency_cases', function (Blueprint $table) {
			$table->id();
			$table->string('chief_complaint');
			$table->string('treatment_given');
			$table->bigInteger('quantity');
			$table->foreignId('medicine_id')->constrained();
			$table->foreignId('patient_id')->constrained();
			$table->foreignId('nurse_id')->constrained('users');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('emergency_cases');
	}
};
