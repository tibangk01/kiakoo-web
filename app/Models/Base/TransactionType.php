<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TransactionType
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Transaction[] $transactions
 *
 * @package App\Models\Base
 */
class TransactionType extends Model
{
	protected $table = 'transaction_types';

	public function transactions()
	{
		return $this->hasMany(Transaction::class);
	}
}
