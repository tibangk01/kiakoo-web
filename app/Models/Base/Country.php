<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Region;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Region[] $regions
 *
 * @package App\Models\Base
 */
class Country extends Model
{
	protected $table = 'countries';

	public function regions()
	{
		return $this->hasMany(Region::class);
	}
}
