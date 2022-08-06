<?php

namespace App\Models;

use App\Models\Base\Status as BaseStatus;

class Status extends BaseStatus
{
	protected $fillable = [
		'name',
		'is_for_order'
	];
}
