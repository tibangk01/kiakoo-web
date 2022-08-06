<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Currency;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Status;
use App\Models\Transaction;
use App\Models\Variation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @property int $id
 * @property string $identifier
 * @property int $customer_id
 * @property int $currency_id
 * @property int $status_id
 * @property int|null $employee_id
 * @property float $total_ht
 * @property float $day_offer_discount
 * @property float $promotion_discount
 * @property float $delivery_price
 * @property float $tax
 * @property float $total_final
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Customer $customer
 * @property Currency $currency
 * @property Employee|null $employee
 * @property Status $status
 * @property Collection|Variation[] $variations
 * @property Collection|Transaction[] $transactions
 *
 * @package App\Models\Base
 */
class Order extends Model
{
	protected $table = 'orders';

	protected $casts = [
		'customer_id' => 'int',
		'currency_id' => 'int',
		'status_id' => 'int',
		'employee_id' => 'int',
		'total_ht' => 'float',
		'day_offer_discount' => 'float',
		'promotion_discount' => 'float',
		'delivery_price' => 'float',
		'tax' => 'float',
		'total_final' => 'float'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	public function currency()
	{
		return $this->belongsTo(Currency::class);
	}

	public function employee()
	{
		return $this->belongsTo(Employee::class);
	}

	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function variations()
	{
		return $this->belongsToMany(Variation::class)
					->withPivot('qty', 'unit_price', 'discount')
					->withTimestamps();
	}

	public function transaction()
	{
		return $this->hasOne(Transaction::class);
	}
}
