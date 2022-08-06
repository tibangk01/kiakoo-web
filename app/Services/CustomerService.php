<?php

namespace App\Services;

use App\Repositories\CustomerRepository;

class CustomerService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new CustomerRepository;
    }

    public function exists($email)
    {
        return $email;
    }
}
