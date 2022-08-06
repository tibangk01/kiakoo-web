<?php

namespace App\Models;

use App\Models\Base\Property as BaseProperty;

class Property extends BaseProperty
{
	protected $fillable = [
		'is_technical',
		'name'
	];
}
