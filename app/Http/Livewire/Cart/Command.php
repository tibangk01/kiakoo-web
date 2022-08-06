<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class Command extends Component
{
    protected $listeners = [
        'commandRefresh' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.cart.command');
    }

    public function command()
    {
        if (session('not_auth'))
            session()->forget('not_auth');

        if (session('cart_empty'))
            session()->forget('cart_empty');

        if (is_null(Auth::user())) {
            session()->flash('not_auth', true);
        } else {

            if (Cart::instance('default')->count() == 0) {
                session()->flash('cart_empty', true);
            } else {
                return redirect()->route('delivery-address.index');
            }
        }

        $this->emit('commandRefresh');
    }
}
