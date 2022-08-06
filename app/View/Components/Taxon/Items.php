<?php

namespace App\View\Components\Taxon;

use App\Models\Taxon;
use App\Models\Variation;
use App\Models\Base\Product;
use Illuminate\View\Component;

class Items extends Component
{
    public $taxonId;
    public $variations;

    public function __construct($taxonId)
    {
        $this->taxonId = $taxonId;

        // select taxonchild
        $taxonChildIds = Taxon::where('id', $this->taxonId)
            ->with(['taxonChildren' => function ($q) {
                $q->select('id', 'taxon_id')->get();
            }])->first()->taxonChildren->pluck('id');

        //select products:
        $productsIds = Product::whereIn('taxon_child_id',  $taxonChildIds)
            ->with(['variations' => function ($q) {
                $q->select('id', 'product_id')->get();
            }])->pluck('id');

        // select variations :
        $this->variations =  Variation::whereIn('product_id', $productsIds)
            ->where('is_published', true)
            ->with(['media', 'discount'])
            ->inRandomOrder()
            ->paginate(config('kiakoo.pagination'));
    }


    public function render()
    {
        return view('components.main.items');
    }
}
