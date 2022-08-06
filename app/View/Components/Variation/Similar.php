<?php

namespace App\View\Components\Variation;

use App\Models\Variation;
use Illuminate\View\Component;

class Similar extends Component
{
    public $variations;

    public function __construct($variationId)
    {
        $productId = Variation::where('id', $variationId)
            ->first()
            ->product_id;

        $this->variations = Variation::where(function ($query) use ($productId, $variationId) {
            $query->where('product_id', $productId)
                ->where('is_published', true)
                ->where('id', '!=', $variationId)
                ->where('stock', '>', 0);
        })->with(['discount', 'media'])
            ->inRandomOrder()
            ->take(6)->get();//TODO: manage if items  lower than 5

    }

    public function render()
    {
        return view('components.variation.similar');
    }
}
