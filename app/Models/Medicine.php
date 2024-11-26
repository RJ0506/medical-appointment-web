<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicine extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'medicine_category',
		'generic_name',
		'brand_name',
		'dosage',
		'quantity',
		'expiration_date',
	];

	public function log_sheets(): HasMany
	{
		return $this->hasMany(MedicineLogSheet::class);
	}

	public function emergency_cases(): HasMany
	{
		return $this->hasMany(EmergencyCase::class);
	}
}
