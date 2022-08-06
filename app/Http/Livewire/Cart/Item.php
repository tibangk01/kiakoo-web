<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use App\Models\Variation;
use Gloudemans\Shoppingcart\Facades\Cart;

class Item extends Component
{
    public $qty;
    public $price; //ok
    public $name; //ok
    public $variationId; //ok
    public $cartId; //ok
    public $image; //ok
    public $discount = null;
    public $dv = null;
    public $variation;

    public function mount($item)
    {
        //price:
        $this->price = $item->price;

        //name:
        $this->name = $item->name;

        //cardId:
        $this->cartId = $item->rowId;

        //image:
        $this->variation = Variation::where('id', $item->id)
            ->with(['media', 'discount'])
            ->firstOrFail();

        $this->image = $this->variation->media->first()->getUrl('thumb');

        //variation id:
        $this->variationId = $this->variation->id;

        $this->qty = $item->qty;

        $this->discount = $this->variation->discount;

        // discount ...
        if (!is_null($this->discount) &&
            $this->discount->expires_at >= now()) {

            $x = $this->discount->quantity;

            if ((int) $this->qty <= $x) {
                $this->dv = $this->discount->amount / 100 * $this->qty;
            } else {
                $this->dv = $this->discount->amount / 100 * $x;
            }

            $this->dv = (int) round($this->dv * $this->variation->price);

            $options  = ['discount' => $this->dv];
            $item = Cart::update($this->cartId,[
                'options' => $options
            ]);

            $this->cartId = $item->rowId;
        }
    }

    public function decrement()
    {
        if ($this->qty <= 1) {
            $this->qty = 1;
        } else {
            $this->qty--;
        }

        if (!is_null($this->discount) &&
        $this->discount->expires_at >=now() &&
        $this->discount->quantity > 0) {

            $x = $this->discount->quantity;

            if ((int)$this->qty <= $x) {
                $this->dv = $this->discount->amount / 100 * $this->qty;
            } else {
                $this->dv = $this->discount->amount / 100 * $x;
            }

            $this->dv = (int) round($this->dv * $this->variation->price);
        }

        Cart::update($this->cartId, $this->qty);
        $options = ['discount' =>  $this->dv];
        $item = Cart::update($this->cartId,[
            'options' => $options,
        ]);
        $this->cartId = $item->rowId;

        $this->emit('cartUpdate');
    }

    public function increment()
    {
        if ($this->qty >= $this->variation->stock) {
            $this->qty = $this->variation->stock;
            session()->flash('info', 'Limite du stock atteint');
        } else {
            $this->qty++;
        }

        if (
            !is_null($this->discount) &&
            $this->discount->expires_at >= now()
        ) {

            $x = $this->discount->quantity;

            if ((int)$this->qty <= $x) {
                $this->dv = $this->discount->amount / 100 * $this->qty;
            } else {
                $this->dv = $this->discount->amount / 100 * $x;
            }

            $this->dv = (int) round($this->dv * $this->variation->price);
        }

        //update card value:
        Cart::update($this->cartId, $this->qty);
        $options = ['discount' =>  $this->dv];
        $item = Cart::update($this->cartId,[
            'options' => $options,
        ]);

        $this->cartId = $item->rowId;

        $this->emit('cartUpdate');
    }

    public function render()
    {
        return view('livewire.cart.item');
    }
}
