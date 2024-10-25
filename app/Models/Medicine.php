<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicine extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'medicine_category_id',
		'generic_name',
		'brand_name',
		'dosage',
		'quantity',
		'expiration_date',
	];
}
