<?php

namespace App\Repositories;

use App\Models\Customer;
use AwesIO\Repository\Eloquent\BaseRepository;

class CustomerRepository extends BaseRepository
{
    public function entity()
    {
        return Customer::class;
    }
}
