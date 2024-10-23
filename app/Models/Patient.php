<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
		'date_of_birth',
		'gender',
		'address',
		'contact_number',
		'contact_person',
		'nationality',
		'year_level',
		'course',
		'relation',
		'department',
		'accountability',
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

	public function appointments(): HasMany
	{
		return $this->hasMany(Appointment::class);
	}
}
