<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Redeemer;
use App\Models\Variation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Discount
 * 
 * @property int $id
 * @property int $discountable_id
 * @property string $discountable_type
 * @property int $quantity
 * @property int $quantity_used
 * @property int $amount
 * @property Carbon $expires_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Variation $variation
 * @property Collection|Redeemer[] $redeemers
 *
 * @package App\Models\Base
 */
class Discount extends Model
{
	protected $table = 'discounts';

	protected $casts = [
		'discountable_id' => 'int',
		'quantity' => 'int',
		'quantity_used' => 'int',
		'amount' => 'int'
	];

	protected $dates = [
		'expires_at'
	];

	public function variation()
	{
		return $this->belongsTo(Variation::class, 'discountable_id');
	}

	public function redeemers()
	{
		return $this->hasMany(Redeemer::class);
	}
}
