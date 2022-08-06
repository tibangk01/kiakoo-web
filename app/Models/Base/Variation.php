<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Discount;
use App\Models\Order;
use App\Models\Packing;
use App\Models\Product;
use App\Models\Property;
use App\Models\PropertyValue;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Variation
 *
 * @property int $id
 * @property int $state_id
 * @property int $product_id
 * @property int $packing_id
 * @property string $sku
 * @property string $name
 * @property string|null $description
 * @property float $price
 * @property int $stock
 * @property int $units_sold
 * @property bool $is_published
 * @property bool $picture_changed
 * @property Carbon $last_sale
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Product $product
 * @property State $state
 * @property Packing $packing
 * @property Collection|Discount[] $discounts
 * @property Collection|Order[] $orders
 * @property Collection|Property[] $properties
 * @property Collection|PropertyValue[] $property_values
 *
 * @package App\Models\Base
 */
class Variation extends Model
{
	protected $table = 'variations';

	protected $casts = [
		'state_id' => 'int',
		'product_id' => 'int',
		'packing_id' => 'int',
		'price' => 'float',
		'stock' => 'int',
		'units_sold' => 'int',
		'is_published' => 'bool',
		'picture_changed' => 'bool'
	];

	protected $dates = [
		'last_sale'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function state()
	{
		return $this->belongsTo(State::class);
	}

	public function packing()
	{
		return $this->belongsTo(Packing::class);
	}

	public function discount()
	{
		return $this->hasOne(Discount::class, 'discountable_id');
	}

	public function properties()
	{
		return $this->belongsToMany(Property::class, 'property_value_variation')
					->withPivot('property_value_id')
					->withTimestamps();
	}

	public function propertyValues()
	{
		return $this->belongsToMany(PropertyValue::class)
					->withPivot('property_id')
					->withTimestamps();
	}
}
