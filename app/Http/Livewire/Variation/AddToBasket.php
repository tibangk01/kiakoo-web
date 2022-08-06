<?php

namespace App\Http\Livewire\Variation;

use Livewire\Component;
use App\Models\Variation;

class AddToBasket extends Component
{
    public $qty = 1;
    public $variationId;
    public $variationStock;

    public function mount($variationId)
    {
        $this->variationId = $variationId;
        $this->variationStock = Variation::where('id', $variationId)
            ->first()
            ->stock;

        if (session('status')) session()->forget('status');

        if ($this->variationStock == 0) {
            $this->qty = 0;
            session()->flash('status', 'En rupture de stock');
        }
    }

    public function increment()
    {
        if ($this->qty > 0 &&  $this->qty >= $this->variationStock) {
            $this->qty = $this->variationStock;
            session()->flash('info', 'Limite du stock atteint');
        } else {
            $this->qty++;
        }
    }

    public function decrement()
    {
        if ($this->qty <= 1) {
            $this->qty = 1;
        } else {
            $this->qty--;
        }
    }

    public function render()
    {
        return view('livewire.variation.add-to-basket');
    }
}
