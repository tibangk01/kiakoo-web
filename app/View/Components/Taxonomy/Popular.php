<?php

namespace App\View\Components\Taxonomy;

use App\Models\Taxonomy;
use App\Models\Variation;
use Illuminate\View\Component;

class Popular extends Component
{
    public $taxonomies;

    public function __construct()
    {
        $taxonomyIds = Variation::where('is_published', true)
            ->with('taxonomy')
            ->orderBy('units_sold', 'desc')
            ->get()->map(function ($variation) {
                return $variation->taxonomy->id;
            })->unique()->flatten()->take(6);

        $this->taxonomies = Taxonomy::whereIn('id', $taxonomyIds)
            ->with('media')
            ->get();
    }

    public function render()
    {
        return view('components.taxonomy.popular');
    }
}
