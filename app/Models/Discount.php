<?php

namespace App\Models;

use App\Models\Base\Discount as BaseDiscount;

class Discount extends BaseDiscount
{
	protected $fillable = [
		'discountable_id',
		'discountable_type',
		'quantity',
		'quantity_used',
		'amount',
		'expires_at'
	];

    public function discountable()
	{
		return $this->morphTo();
	}
}
