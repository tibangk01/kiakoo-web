<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\Base\Taxonomy as BaseTaxonomy;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Taxonomy extends BaseTaxonomy implements HasMedia
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships,
        InteractsWithMedia;

    protected $fillable = [
        'name'
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('taxonomies')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->nonQueued()
                    ->width(200)
                    ->height(200);
            });
    }

    public function variations()
    {
        return $this->hasManyDeep(Variation::class, [Taxon::class, TaxonChild::class, Product::class]);
    }
}
