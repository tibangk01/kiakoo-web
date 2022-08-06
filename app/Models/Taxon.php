<?php

namespace App\Models;

use App\Models\Base\Taxon as BaseTaxon;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

class Taxon extends BaseTaxon
{
    use HasRelationships;

	protected $fillable = [
		'taxonomy_id',
		'name'
	];

    public function variations()
    {
        return $this->hasManyDeep(Variation::class, [TaxonChild::class, Product::class]);
    }
}
