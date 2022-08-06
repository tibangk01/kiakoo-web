<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Brand;
use App\Models\Property;
use App\Models\PropertyValue;
use App\Models\TaxonChild;
use App\Models\Variation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property int $id
 * @property int $taxon_child_id
 * @property int $brand_id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property TaxonChild $taxon_child
 * @property Brand $brand
 * @property Collection|Property[] $properties
 * @property Collection|PropertyValue[] $property_values
 * @property Collection|Variation[] $variations
 *
 * @package App\Models\Base
 */
class Product extends Model
{
	protected $table = 'products';

	protected $casts = [
		'taxon_child_id' => 'int',
		'brand_id' => 'int'
	];

	public function taxonChild()
	{
		return $this->belongsTo(TaxonChild::class);
	}

	public function brand()
	{
		return $this->belongsTo(Brand::class);
	}

	public function properties()
	{
		return $this->belongsToMany(Property::class)
					->withTimestamps();
	}

	public function propertyValues()
	{
		return $this->belongsToMany(PropertyValue::class)
					->withTimestamps();
	}

	public function variations()
	{
		return $this->hasMany(Variation::class);
	}
}
