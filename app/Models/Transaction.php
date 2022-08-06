<?php

namespace App\Models;

use App\Models\Base\Transaction as BaseTransaction;

class Transaction extends BaseTransaction
{
	protected $fillable = [
		'transaction_type_id',
		'status_id',
		'order_id',
		'amount',
		'verified_at'
	];
}
