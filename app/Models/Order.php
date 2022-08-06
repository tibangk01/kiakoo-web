<?php

namespace App\Models;

use App\Models\Base\Order as BaseOrder;

class Order extends BaseOrder
{
	protected $fillable = [
		'identifier',
		'customer_id',
		'currency_id',
		'status_id',
		'employee_id',
		'total_ht',
		'day_offer_discount',
		'promotion_discount',
		'delivery_price',
		'tax',
		'total_final'
	];
}
