<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

class Info extends Component
{
    protected $listeners = ['cartUpdate' => '$refresh'];

    public function render()
    {
        return view('livewire.cart.info');
    }
}
