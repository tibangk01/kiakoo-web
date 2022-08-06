<?php

namespace App\Models;

use App\Models\Base\District as BaseDistrict;

class District extends BaseDistrict
{
	protected $fillable = [
		'municipality_id',
		'name'
	];
}
