<?php

namespace App\Models;

use App\Models\Base\Human as BaseHuman;

class Human extends BaseHuman
{
	protected $fillable = [
		'gender_id',
		'first_name',
		'last_name'
	];
}
