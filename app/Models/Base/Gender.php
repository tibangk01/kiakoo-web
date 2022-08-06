<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Human;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Gender
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Human[] $humans
 *
 * @package App\Models\Base
 */
class Gender extends Model
{
	protected $table = 'genders';

	public function humans()
	{
		return $this->hasMany(Human::class);
	}
}
