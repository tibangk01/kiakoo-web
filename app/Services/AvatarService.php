<?php

namespace App\Services;

use App\Models\User;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AvatarService
{
    // public function update()
    // {
    //     return auth()
    //         ->user()
    //         ->addMediaFromRequest('avatar')
    //         ->toMediaCollection('avatar');
    // }

    public function createDefault(User $user): Media
    {
        return $user
            ->addMedia(base_path('public/defaults/avatar.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('avatar');
    }
}
