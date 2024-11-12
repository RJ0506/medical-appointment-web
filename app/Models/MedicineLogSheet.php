<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicineLogSheet extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'patient_id',
		'medicine_id',
		'chief_complaint',
		'quantity'
	];

	public function medicine(): BelongsTo
	{
		return $this->belongsTo(Medicine::class);
	}

	public function patient(): BelongsTo
	{
		return $this->belongsTo(Patient::class);
	}
}
