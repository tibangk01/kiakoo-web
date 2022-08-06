<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Cash;
use App\Models\Order;
use App\Models\Status;
use App\Models\TransactionType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaction
 *
 * @property int $id
 * @property int $transaction_type_id
 * @property int $status_id
 * @property int $order_id
 * @property float $amount
 * @property Carbon|null $verified_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Order $order
 * @property Status $status
 * @property TransactionType $transaction_type
 * @property Collection|Cash[] $cashes
 *
 * @package App\Models\Base
 */
class Transaction extends Model
{
	protected $table = 'transactions';

	protected $casts = [
		'transaction_type_id' => 'int',
		'status_id' => 'int',
		'order_id' => 'int',
		'amount' => 'float'
	];

	protected $dates = [
		'verified_at'
	];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function transactionType()
	{
		return $this->belongsTo(TransactionType::class);
	}

	public function cashes()
	{
		return $this->hasMany(Cash::class);
	}
}
