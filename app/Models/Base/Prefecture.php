<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Municipality;
use App\Models\Region;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Prefecture
 * 
 * @property int $id
 * @property int $region_id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Region $region
 * @property Collection|Municipality[] $municipalities
 *
 * @package App\Models\Base
 */
class Prefecture extends Model
{
	protected $table = 'prefectures';

	protected $casts = [
		'region_id' => 'int'
	];

	public function region()
	{
		return $this->belongsTo(Region::class);
	}

	public function municipalities()
	{
		return $this->hasMany(Municipality::class);
	}
}
