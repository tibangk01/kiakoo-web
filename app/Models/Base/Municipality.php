<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\District;
use App\Models\Prefecture;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Municipality
 * 
 * @property int $id
 * @property int $prefecture_id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Prefecture $prefecture
 * @property Collection|District[] $districts
 *
 * @package App\Models\Base
 */
class Municipality extends Model
{
	protected $table = 'municipalities';

	protected $casts = [
		'prefecture_id' => 'int'
	];

	public function prefecture()
	{
		return $this->belongsTo(Prefecture::class);
	}

	public function districts()
	{
		return $this->hasMany(District::class);
	}
}
