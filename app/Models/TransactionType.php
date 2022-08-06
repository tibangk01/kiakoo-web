<?php

namespace App\Models;

use App\Models\Base\TransactionType as BaseTransactionType;

class TransactionType extends BaseTransactionType
{
	protected $fillable = [
		'name'
	];
}
