<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Address;
use App\Models\Municipality;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class District
 * 
 * @property int $id
 * @property int $municipality_id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Municipality $municipality
 * @property Collection|Address[] $addresses
 *
 * @package App\Models\Base
 */
class District extends Model
{
	protected $table = 'districts';

	protected $casts = [
		'municipality_id' => 'int'
	];

	public function municipality()
	{
		return $this->belongsTo(Municipality::class);
	}

	public function addresses()
	{
		return $this->hasMany(Address::class);
	}
}
