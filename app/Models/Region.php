<?php

namespace App\Models;

use App\Models\Base\Region as BaseRegion;

class Region extends BaseRegion
{
	protected $fillable = [
		'country_id',
		'name'
	];
}
