<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Country;
use App\Models\Prefecture;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Region
 * 
 * @property int $id
 * @property int $country_id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Country $country
 * @property Collection|Prefecture[] $prefectures
 *
 * @package App\Models\Base
 */
class Region extends Model
{
	protected $table = 'regions';

	protected $casts = [
		'country_id' => 'int'
	];

	public function country()
	{
		return $this->belongsTo(Country::class);
	}

	public function prefectures()
	{
		return $this->hasMany(Prefecture::class);
	}
}
