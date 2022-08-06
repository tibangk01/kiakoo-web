<?php

namespace App\Models;

use App\Models\Base\Product as BaseProduct;

class Product extends BaseProduct
{
	protected $fillable = [
		'taxon_child_id',
		'brand_id',
		'name'
	];
}
