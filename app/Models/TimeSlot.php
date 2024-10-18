<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeSlot extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = ['time'];

	public function service_categories(): BelongsToMany
	{
		return $this->belongsToMany(ServiceCategory::class, 'service_category_has_time_slots');
	}

}
