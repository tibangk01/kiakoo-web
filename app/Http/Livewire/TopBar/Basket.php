<?php

namespace App\Http\Livewire\TopBar;

use Livewire\Component;

class Basket extends Component
{
    protected $listeners = ['cartUpdate' => '$refresh'];

    public function render()
    {
        return view('livewire.top-bar.basket');
    }
}
