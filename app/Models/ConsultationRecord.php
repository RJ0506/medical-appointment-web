<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConsultationRecord extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'record_date',
		'complaints',
		'treatment',
		'diagnosis',
		'tooth_count',
		'recommendation',
		'remarks',
		'service_category_id',
		'patient_id',
		'doctor_id',
	];

	public function service_category(): BelongsTo
	{
		return $this->belongsTo(ServiceCategory::class);
	}

	public function patient(): BelongsTo
	{
		return $this->belongsTo(Patient::class);
	}

	public function doctor(): BelongsTo
	{
		return $this->belongsTo(User::class, 'doctor_id');
	}
}
