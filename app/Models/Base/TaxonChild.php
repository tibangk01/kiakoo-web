<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Product;
use App\Models\Taxon;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TaxonChild
 * 
 * @property int $id
 * @property int $taxon_id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Taxon $taxon
 * @property Collection|Product[] $products
 *
 * @package App\Models\Base
 */
class TaxonChild extends Model
{
	protected $table = 'taxon_children';

	protected $casts = [
		'taxon_id' => 'int'
	];

	public function taxon()
	{
		return $this->belongsTo(Taxon::class);
	}

	public function products()
	{
		return $this->hasMany(Product::class);
	}
}
