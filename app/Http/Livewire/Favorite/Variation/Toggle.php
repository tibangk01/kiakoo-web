<?php

namespace App\Http\Livewire\Favorite\Variation;

use Livewire\Component;
use App\Models\Variation;
use Illuminate\Support\Facades\Auth;

class Toggle extends Component
{
    protected $listeners = ['variationFavoriteToggled' => 'fresh'];

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

        $this->emit('variationFavoriteToggled');
    }

    public function render()
    {
        return view('livewire.favorite.variation.toggle');
    }
}
