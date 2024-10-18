<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceCategory extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = ['name', 'description'];

	public function types(): HasMany
	{
		return $this->hasMany(ServiceType::class);
	}

	public function appointment_time_slots(): BelongsToMany
	{
		return $this->belongsToMany(TimeSlot::class, 'service_category_has_time_slots');
	}
}
