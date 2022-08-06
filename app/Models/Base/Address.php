<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Customer;
use App\Models\District;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Address
 * 
 * @property int $id
 * @property int $customer_id
 * @property int $district_id
 * @property string $value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property District $district
 * @property Customer $customer
 *
 * @package App\Models\Base
 */
class Address extends Model
{
	protected $table = 'addresses';

	protected $casts = [
		'customer_id' => 'int',
		'district_id' => 'int'
	];

	public function district()
	{
		return $this->belongsTo(District::class);
	}

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}
}
