<?php

namespace App\Repositories;

use App\Models\Variation;
use AwesIO\Repository\Eloquent\BaseRepository;

class VariationRepository extends BaseRepository
{
    public function entity()
    {
        return Variation::class;
    }
}
