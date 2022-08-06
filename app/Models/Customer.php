<?php

namespace App\Models;

use App\Models\Base\Customer as BaseCustomer;

class Customer extends BaseCustomer
{
	protected $fillable = [
		'phone_number',
		'user_id',
		'human_id',
	];
}
