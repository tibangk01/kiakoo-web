<?php

namespace App\Models;

use App\Models\Base\TaxonChild as BaseTaxonChild;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

class TaxonChild extends BaseTaxonChild
{
    use HasRelationships;

	protected $fillable = [
		'taxon_id',
		'name'
	];

    public function variations()
    {
        return $this->hasManyDeep(Variation::class,[Product::class]);
    }
}
