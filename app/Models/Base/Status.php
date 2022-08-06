<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Order;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 * 
 * @property int $id
 * @property string $name
 * @property bool $is_for_order
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Order[] $orders
 * @property Collection|Transaction[] $transactions
 *
 * @package App\Models\Base
 */
class Status extends Model
{
	protected $table = 'status';

	protected $casts = [
		'is_for_order' => 'bool'
	];

	public function orders()
	{
		return $this->hasMany(Order::class);
	}

	public function transactions()
	{
		return $this->hasMany(Transaction::class);
	}
}
