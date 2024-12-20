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
		Schema::create('medicine_log_sheets', function (Blueprint $table) {
			$table->id();
			$table->foreignId('patient_id')->constrained();
			$table->foreignId('medicine_id')->constrained();
			$table->text('chief_complaint');
			$table->bigInteger('quantity');
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
		Schema::dropIfExists('medicine_log_sheets');
	}
};
