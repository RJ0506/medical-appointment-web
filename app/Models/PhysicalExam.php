<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhysicalExam extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		"scheduled_date",
		"purpose",
		"time_slot",
		"patient_id",
		"status"
	];


	public function patient(): BelongsTo
	{
		return $this->belongsTo(Patient::class);
	}
}
