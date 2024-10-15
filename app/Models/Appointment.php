<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
	use HasFactory;


	public function service_type(): BelongsTo
	{
		return $this->belongsTo(ServiceType::class);
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
