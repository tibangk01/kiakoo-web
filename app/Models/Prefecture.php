<?php

namespace App\Models;

use App\Models\Base\Prefecture as BasePrefecture;

class Prefecture extends BasePrefecture
{
	protected $fillable = [
		'region_id',
		'name'
	];
}
