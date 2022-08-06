<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Znck\Eloquent\Traits\BelongsToThrough;
use BeyondCode\Comments\Traits\HasComments;
use Spatie\MediaLibrary\InteractsWithMedia;
use Nagy\LaravelRating\Traits\Rate\Rateable;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use App\Models\Base\Variation as BaseVariation;
use ChristianKuri\LaravelFavorite\Traits\Favoriteable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Variation extends BaseVariation implements HasMedia, Buyable
{
    use InteractsWithMedia,
        BelongsToThrough,
        HasComments,
        Rateable,
        Favoriteable;

    protected $fillable = [
        'state_id',
        'product_id',
        'packing_id',
        'sku',
        'name',
        'description',
        'price',
        'stock',
        'units_sold',
        'is_published',
        'picture_changed',
        'last_sale'
    ];

    public function taxonomy()
    {
        return $this->belongsToThrough(Taxonomy::class, [Taxon::class,TaxonChild::class,Product::class]);
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('variations')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->nonQueued()
                    ->width(200)
                    ->height(200);
                $this
                    ->addMediaConversion('slides')
                    ->width(310)
                    ->height(470)
                    ->nonQueued();
            });
    }

    /** cart methods */
    public function getBuyableIdentifier($options = null) {
        return $this->id;
    }

    public function getBuyableDescription($options = null) {
        return $this->name;
    }

    public function getBuyablePrice($options = null) {
        return roundUp((int)$this->price);
    }

    public function getBuyableWeight($options = null){
        return 1;
    }
    /** end cart methods */
}
