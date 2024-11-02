<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
	use HasFactory, SoftDeletes;


	protected $fillable = [
		'appointment_schedule_id',
		'patient_id',
		'status',
		'service_type_id',
	];

	public function appointment_schedule(): BelongsTo
	{
		return $this->belongsTo(AppointmentSchedule::class);
	}

	public function patient(): BelongsTo
	{
		return $this->belongsTo(Patient::class);
	}
}
