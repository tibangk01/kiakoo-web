<?php

namespace App\Http\Livewire\Favorite\Cart;

use Livewire\Component;
use App\Models\Variation;
use Illuminate\Support\Facades\Auth;

class Toggle extends Component
{
    protected $listeners = ['cartFavoriteToggled' => 'fresh'];

    public $variation;
    public $variationId;

    public function mount($variationId)
    {
        $this->variationId = $variationId;
        $this->variation = Variation::with('favorites')->findOrFail($variationId);
    }

    public function fresh()
    {
        $this->mount($this->variationId);
        $this->render();
    }

    public function toggle()
    {
        if(Auth::user())
        {
            $this->variation->toggleFavorite();
        }else{
            session()->flash('not_auth', true);
        }

        $this->emit('cartFavoriteToggled');
    }

    public function render()
    {
        return view('livewire.favorite.cart.toggle');
    }
}
