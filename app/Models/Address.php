<?php

namespace App\Models;

use App\Models\Base\Address as BaseAddress;

class Address extends BaseAddress
{
	protected $fillable = [
		'customer_id',
		'district_id',
		'value'
	];
}
