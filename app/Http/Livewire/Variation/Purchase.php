<?php

namespace App\Http\Livewire\Variation;

use Livewire\Component;
use App\Models\Variation;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class Purchase extends Component
{
    protected $listeners = [
        'purchaseRefresh' => '$refresh',
    ];

    public $variation;
    public $qty;
    public $cart;

    public function mount($variationId, $qty)
    {
        $this->variation = Variation::where('id', $variationId)
            ->with(['discount'])
            ->firstOrFail();

        $this->qty = $qty;
    }

    public function render()
    {
        return view('livewire.variation.purchase');
    }

    public function purchase()
    {
        // check if auth:
        if (session('not_auth'))
            session()->forget('not_auth');

        if (is_null(Auth::user())) {

            session()->flash('not_auth', true);

            $this->emit('purchaseRefresh');

        }else{

            // reset cart
            Cart::destroy();

            $discount = $this->variation->discount;

            $dv = 0;
            if (!is_null($discount) &&
                now() <  $discount->expires_at &&
                $discount->quantity > 0) {

                $x = $discount->quantity - $discount->quantity_used;

                if ((int)$this->qty <= $x) {
                    $dv = $discount->amount / 100 * $this->qty;
                } else {
                    $dv = $discount->amount / 100 * $x;
                }

                $dv = (int) round($dv * $this->variation->price);
            }

            Cart::add($this->variation, $this->qty, ['discount' => $dv]);


            if(is_null(Auth::user()->customer->addresses->last()))
            {
                return redirect()->route('delivery-address.create');
            }

            return redirect()->route('delivery-address.index');
        }
    }
}
