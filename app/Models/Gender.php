<?php

namespace App\Models;

use App\Models\Base\Gender as BaseGender;

class Gender extends BaseGender
{
	protected $fillable = [
		'name'
	];
}
