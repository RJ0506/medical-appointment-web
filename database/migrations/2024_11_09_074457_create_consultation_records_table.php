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
		Schema::create('consultation_records', function (Blueprint $table) {
			$table->id();
			$table->dateTime('record_date');
			$table->text('complaints');
			$table->string('treatment')->nullable();
			$table->string('diagnosis')->nullable();
			$table->integer('tooth_count')->nullable();
			$table->text('recommendation')->nullable();
			$table->text('remarks')->nullable();
			$table->foreignId('service_category_id');
			$table->foreignId('patient_id')->constrained();
			$table->foreignId('doctor_id')->constrained('users');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('consultation_records');
	}
};
