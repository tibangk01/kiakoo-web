<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Discount;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Redeemer
 * 
 * @property int $id
 * @property int $redeemable_id
 * @property string $redeemable_type
 * @property int $discount_id
 * @property int $quantity
 * @property Carbon $redeemed_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Discount $discount
 *
 * @package App\Models\Base
 */
class Redeemer extends Model
{
	protected $table = 'redeemers';

	protected $casts = [
		'redeemable_id' => 'int',
		'discount_id' => 'int',
		'quantity' => 'int'
	];

	protected $dates = [
		'redeemed_at'
	];

	public function discount()
	{
		return $this->belongsTo(Discount::class);
	}
}
