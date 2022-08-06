<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Product;
use App\Models\Property;
use App\Models\Variation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PropertyValue
 * 
 * @property int $id
 * @property int $property_id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Property $property
 * @property Collection|Product[] $products
 * @property Collection|Variation[] $variations
 *
 * @package App\Models\Base
 */
class PropertyValue extends Model
{
	protected $table = 'property_values';

	protected $casts = [
		'property_id' => 'int'
	];

	public function property()
	{
		return $this->belongsTo(Property::class);
	}

	public function products()
	{
		return $this->belongsToMany(Product::class)
					->withTimestamps();
	}

	public function variations()
	{
		return $this->belongsToMany(Variation::class)
					->withPivot('property_id')
					->withTimestamps();
	}
}
