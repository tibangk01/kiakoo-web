<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Electronic
 * 
 * @property int $id
 * @property int $transaction_id
 * @property string $tx_reference
 * @property string $identifier
 * @property string $payment_reference
 * @property string $amount
 * @property string $datetime
 * @property string $payment_method
 * @property string $phone_number
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Transaction $transaction
 *
 * @package App\Models\Base
 */
class Electronic extends Model
{
	protected $table = 'electronics';

	protected $casts = [
		'transaction_id' => 'int'
	];

	public function transaction()
	{
		return $this->belongsTo(Transaction::class);
	}
}
