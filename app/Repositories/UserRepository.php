<?php

namespace App\Repositories;

use App\Models\User;
use AwesIO\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository
{
    public function entity()
    {
        return User::class;
    }

    public function customerExists($email)
    {
        return $this->entity->where(function ($q) use ($email) {
            $q->where('email', $email)
                ->where('user_type', 2)
                ->where('email_verified_at', '!=', null);
        })->first() ? true : false;
    }
}
