<?php

namespace App\View\Components\Variation;

use App\Models\Taxon;
use App\Models\Product;
use App\Models\Variation;
use App\Models\TaxonChild;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $taxon;
    public $taxonomy;
    public $variation;
    public $variationId;
    public $taxonChild;

    public function __construct($variationId)
    {
        //get variation:
        $this->variation = Variation::where('id', $variationId)
            ->first();

        //get product:
        $product = Variation::where('id', $variationId)
            ->first()
            ->product;

        // get taxon child:
        $this->taxonChild = Product::where('id',  $product->id)
            ->with('taxonChild')
            ->first()
            ->taxonChild;

        // get taxon:
        $this->taxon = TaxonChild::where('id', $this->taxonChild->id)
            ->with('taxon')
            ->first()
            ->taxon;

        // get taxonomy:
        $this->taxonomy = Taxon::where('id', $this->taxon->id)
            ->with('taxonomy')
            ->first()
            ->taxonomy;
    }

    public function render()
    {
        return view('components.variation.breadcrumb');
    }
}
