<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppointmentSchedule extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'day_of_week',
		'start_time',
		'end_time',
		'doctor_id',
		'service_type_id',
	];

	public function appointment(): HasMany
	{
		return $this->hasMany(Appointment::class);
	}

	public function service_type(): BelongsTo
	{
		return $this->belongsTo(ServiceType::class);
	}

	public function doctor(): BelongsTo
	{
		return $this->belongsTo(User::class, 'doctor_id');
	}
}
