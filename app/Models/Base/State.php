<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Variation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class State
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Variation[] $variations
 *
 * @package App\Models\Base
 */
class State extends Model
{
	protected $table = 'states';

	public function variations()
	{
		return $this->hasMany(Variation::class);
	}
}
