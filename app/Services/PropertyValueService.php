<?php

namespace App\Services;

use App\Models\Variation;
use App\Repositories\VariationRepository;
use App\Repositories\PropertyValueRepository;

class PropertyValueService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new PropertyValueRepository;
    }
}
