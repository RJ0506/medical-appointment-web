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
		Schema::create('service_categories', function (Blueprint $table) {
			$table->id();
			$table->string('name')->unique();
			$table->text('description')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});

		//Pivot table
		Schema::create('service_category_has_time_slots', function (Blueprint $table) {
			$table->foreignId('service_category_id')->constrained()->cascadeOnDelete();
			$table->foreignId('time_slot_id')->constrained()->cascadeOnDelete();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('service_categories');
		Schema::dropIfExists('service_category_has_time_slots');
	}
};
