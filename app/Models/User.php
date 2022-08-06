<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Notifications\Notifiable;
use Gabievi\Promocodes\Traits\Rewardable;
use Nagy\LaravelRating\Traits\Like\CanLike;
use Nagy\LaravelRating\Traits\Rate\CanRate;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Lab404\AuthChecker\Models\HasLoginsAndDevices;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Foundation\Auth\User as Authenticatable;
use ChristianKuri\LaravelFavorite\Traits\Favoriteability;
use Lab404\AuthChecker\Interfaces\HasLoginsAndDevicesInterface;

class User extends Authenticatable implements MustVerifyEmail, HasMedia,HasLoginsAndDevicesInterface
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        InteractsWithMedia,
        HasLoginsAndDevices,
        Rewardable,
        CanRate,
        CanLike,
        Favoriteability;

    protected $table = 'users';

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $fillable = [
        'email',
        'user_type',
        'email_verified_at',
        'password',
        'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'user_type' => 'bool',
    ];

    protected $dates = [
        'email_verified_at'
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatar')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->nonQueued()
                    ->width(200)
                    ->height(200);
            });
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function redeemers()
    {
        return $this->morphMany(Redeemer::class, 'redeemable');
    }
}
