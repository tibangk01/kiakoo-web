<?php

namespace App\View\Components\Payment;

use App\Models\Order;
use App\Models\Product;
use App\Models\Variation;
use Illuminate\View\Component;

class Similar extends Component
{
    public $variations;

    public function __construct($orderId)
    {
        $order = Order::findOrFail($orderId);

        $this->variations = $order->load(['variations.product.variations.media', 'variations.product.variations.discount',])->variations->map(function ($variation) {

            return [
                'variation_id' => $variation->id,
                'product' => $variation->product,
            ];

        })->map(function ($data) {

            $varId = $data['variation_id'];
            $product = $data['product'];

            return $product
                ->variations
                ->where('stock', '>', 0)
                ->where('id', '!=', $varId);
        })->flatten(1)
            ->shuffle()
            ->take(3);
    }

    public function render()
    {
        return view('components.payment.similar');
    }
}
