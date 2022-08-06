<?php

namespace App\Models;

use App\Models\Base\Redeemer as BaseRedeemer;

class Redeemer extends BaseRedeemer
{
	protected $fillable = [
		'redeemable_id',
		'redeemable_type',
		'discount_id',
		'quantity',
		'redeemed_at'
	];

    public function redeemable()
    {
        return $this->morphTo();
    }
}
