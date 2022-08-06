<?php

namespace App\View\Components\Taxonomy;

use App\Models\Taxon;
use App\Models\Product;
use App\Models\Taxonomy;
use App\Models\Variation;
use App\Models\TaxonChild;
use Illuminate\View\Component;

class Items extends Component
{
    public $taxonomyId;
    public $variations;

    public function __construct($taxonomyId)
    {
        $this->taxonomyId = $taxonomyId;

        $taxonIds = Taxonomy::where('id', $this->taxonomyId)
            ->with('taxons')->first()->taxons->pluck('id');

        $taxonChildrenIds = Taxon::whereIn('id', $taxonIds)
            ->with('taxonChildren')->get()->map(function ($taxon) {
                return $taxon->taxonChildren->pluck('id');
            })->flatten();

        $productsIds = TaxonChild::whereIn('id', $taxonChildrenIds)
            ->with('products')->get()->map(function ($taxonChild) {
                return $taxonChild->products->pluck('id');
            })->flatten();

        $variationIds = Product::whereIn('id', $productsIds)
            ->with(['variations' => function ($q) {
                $q->where('is_published', true)->get();
            }])->get()->map(function ($product) {
                return $product->variations->pluck('id');
            })->flatten();

        $this->variations = Variation::whereIn('id', $variationIds)
            ->with(['media', 'discount'])
            ->inRandomOrder()
            ->paginate(config('kiakoo.pagination'));
    }

    public function render()
    {
        return view('components.main.items');
    }
}
