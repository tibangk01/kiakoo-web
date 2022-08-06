<?php

namespace App\Models;

use App\Models\Base\Cash as BaseCash;

class Cash extends BaseCash
{
	protected $fillable = [
		'transaction_id'
	];
}
