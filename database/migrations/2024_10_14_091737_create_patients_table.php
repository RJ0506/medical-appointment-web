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
		Schema::create('patients', function (Blueprint $table) {
			$table->id();
			$table->string('id_number')->unique();
			$table->string('first_name');
			$table->string('middle_initial')->nullable();
			$table->string('last_name');
			$table->string('email')->unique();
			$table->string('password');
			$table->date('date_of_birth');
			$table->string('place_of_birth');
			$table->enum('gender', ['Male', 'Female']);
			$table->text('address');
			$table->string('contact_number')->unique();
			$table->string('contact_person');
			$table->string('nationality');
			$table->enum('name_extension', ['Jr.', 'Sr.', 'I', 'II', 'III', 'IV', 'V'])->nullable();
			$table->string('zip_code')->nullable();
			//Student fields
			$table->enum('year_level', ['1st', '2nd', '3rd', '4th']);
			$table->string('course')->nullable();
			//Employee fields 
			$table->string('relation')->nullable();
			$table->string('department')->nullable();
			$table->string('accountability')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('patients');
	}
};
