<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceType extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = ['name', 'description', 'service_category_id'];

	public function category(): BelongsTo
	{
		return $this->belongsTo(ServiceCategory::class, 'service_category_id');
	}

	public function appointment_schedules(): HasMany
	{
		return $this->hasMany(AppointmentSchedule::class);
	}
}
