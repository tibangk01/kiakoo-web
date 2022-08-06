<?php

namespace App\Repositories;

use App\Models\PropertyValue;
use AwesIO\Repository\Eloquent\BaseRepository;

class PropertyValueRepository extends BaseRepository
{
    public function entity()
    {
        return PropertyValue::class;
    }
}
