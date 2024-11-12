<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Patient extends Authenticatable
{
	use HasFactory, HasApiTokens, HasFactory, HasRoles, SoftDeletes;

	protected $guard_name = 'api';
	protected $fillable = [
		'id_number',
		'first_name',
		'second_name',
		'last_name',
		'email',
		'password',
		'place_of_birth',
		'date_of_birth',
		'gender',
		'address',
		'contact_number',
		'contact_person',
		'contact_person_number',
		'zip_code',
		'name_extension',
		'nationality',
		'department',
		'year_level',
		'relation',
		'classification',
		'profession',
	];


	protected $hidden = [
		'password',
	];

	/**
	 * Get the attributes that should be cast.
	 *
	 * @return array<string, string>
	 */
	protected function casts(): array
	{
		return [
			'password' => 'hashed',
		];
	}

	public function department(): BelongsTo
	{
		return $this->belongsTo(Department::class);
	}

	public function appointments(): HasMany
	{
		return $this->hasMany(Appointment::class);
	}

	public function log_sheets()
	{
		return $this->hasMany(MedicineLogSheet::class);
	}

	public function consultation_records(): HasMany
	{
		return $this->hasMany(ConsultationRecord::class);
	}
}
