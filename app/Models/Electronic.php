<?php

namespace App\Models;

use App\Models\Base\Electronic as BaseElectronic;

class Electronic extends BaseElectronic
{
	protected $fillable = [
		'transaction_id',
		'tx_reference',
		'identifier',
		'payment_reference',
		'amount',
		'datetime',
		'payment_method',
		'phone_number'
	];
}
