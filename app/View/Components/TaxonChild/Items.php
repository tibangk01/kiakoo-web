<?php

namespace App\View\Components\TaxonChild;

use App\Models\Variation;
use App\Models\TaxonChild;
use Illuminate\View\Component;

class Items extends Component
{
    public $variations;

    public function __construct($taxonChildId)
    {
        $productIds = TaxonChild::where('id', $taxonChildId)
            ->with(['products'])
            ->first()
            ->products
            ->pluck('id');

        $this->variations = Variation::with('media', 'discount')
            ->where(function ($query) use ($productIds) {
                $query->where('is_published', true)
                    ->whereIn('product_id', $productIds);
            })->inRandomOrder()
            ->paginate(config('kiakoo.pagination'));
    }

    public function render()
    {
        return view('components.main.items');
    }
}
