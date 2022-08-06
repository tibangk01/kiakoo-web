<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cash
 * 
 * @property int $id
 * @property int $transaction_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Transaction $transaction
 *
 * @package App\Models\Base
 */
class Cash extends Model
{
	protected $table = 'cashes';

	protected $casts = [
		'transaction_id' => 'int'
	];

	public function transaction()
	{
		return $this->belongsTo(Transaction::class);
	}
}
