<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Taxon;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Taxonomy
 *
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|Taxon[] $taxa
 *
 * @package App\Models\Base
 */
class Taxonomy extends Model
{
	protected $table = 'taxonomies';

	public function taxons()
	{
		return $this->hasMany(Taxon::class);
	}
}
