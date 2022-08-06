<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\TaxonChild;
use App\Models\Taxonomy;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Taxon
 *
 * @property int $id
 * @property int $taxonomy_id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Taxonomy $taxonomy
 * @property Collection|TaxonChild[] $taxon_children
 *
 * @package App\Models\Base
 */
class Taxon extends Model
{
	protected $table = 'taxons';

	protected $casts = [
		'taxonomy_id' => 'int'
	];

	public function taxonomy()
	{
		return $this->belongsTo(Taxonomy::class);
	}

	public function taxonChildren()
	{
		return $this->hasMany(TaxonChild::class);
	}
}
