<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmergencyCase extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'chief_complaint',
		'treatment_given',
		'quantity',
		'medicine_id',
		'patient_id',
		'nurse_id',
	];

	public function patient(): BelongsTo
	{
		return $this->belongsTo(Patient::class);
	}
	public function nurse(): BelongsTo
	{
		return $this->belongsTo(User::class, 'nurse_id');
	}

	public function medicine(): BelongsTo
	{
		return $this->belongsTo(Medicine::class);
	}
}
