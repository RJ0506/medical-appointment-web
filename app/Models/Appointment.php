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
		'scheduled_date',
		'appointment_schedule_id',
		'patient_id',
		'status',
	];

	public function schedule(): BelongsTo
	{
		return $this->belongsTo(AppointmentSchedule::class, 'appointment_schedule_id');
	}

	public function patient(): BelongsTo
	{
		return $this->belongsTo(Patient::class);
	}

}
