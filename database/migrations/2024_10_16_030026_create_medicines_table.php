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
		Schema::create('medicines', function (Blueprint $table) {
			$table->id();
			$table->foreignId('medicine_category_id')->constrained();
			$table->string('generic_name');
			$table->string('brand_name')->nullable();
			$table->string('dosage', );
			$table->bigInteger('quantity');
			$table->date('expiration_date');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('medicines');
	}
};
