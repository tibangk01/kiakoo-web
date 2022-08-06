<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Gender;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Human
 *
 * @property int $id
 * @property int $gender_id
 * @property string $first_name
 * @property string $last_name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Gender $gender
 * @property Collection|Customer[] $customers
 * @property Collection|Employee[] $employees
 *
 * @package App\Models\Base
 */
class Human extends Model
{
	protected $table = 'humans';

	protected $casts = [
		'gender_id' => 'int'
	];

	public function gender()
	{
		return $this->belongsTo(Gender::class);
	}

	public function customer()
	{
		return $this->hasOne(Customer::class);
	}
}
