<?php

namespace App\Models;

use App\Models\Base\PropertyValue as BasePropertyValue;

class PropertyValue extends BasePropertyValue
{
	protected $fillable = [
		'property_id',
		'name'
	];
}
