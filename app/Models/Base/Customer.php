<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Address;
use App\Models\Human;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 * 
 * @property int $id
 * @property int $user_id
 * @property int $human_id
 * @property string $phone_number
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Human $human
 * @property User $user
 * @property Collection|Address[] $addresses
 * @property Collection|Order[] $orders
 *
 * @package App\Models\Base
 */
class Customer extends Model
{
	protected $table = 'customers';

	protected $casts = [
		'user_id' => 'int',
		'human_id' => 'int'
	];

	public function human()
	{
		return $this->belongsTo(Human::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function addresses()
	{
		return $this->hasMany(Address::class);
	}

	public function orders()
	{
		return $this->hasMany(Order::class);
	}
}
