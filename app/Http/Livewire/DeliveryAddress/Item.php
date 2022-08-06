<?php

namespace App\Http\Livewire\DeliveryAddress;

use Livewire\Component;
use App\Models\Variation;

class Item extends Component
{
    public $qty;
    public $name;
    public $image;
    public $price;
    public $discount;

    public function mount($item)
    {
        $this->qty = $item->qty;
        $this->price = $item->price;
        $this->name = $item->name;
        $this->discount = $item->options->first();

        $variation = Variation::where('id', $item->id)
            ->with(['media', 'discount'])
            ->firstOrFail();

        $this->image = $variation
            ->media
            ->first()
            ->getUrl('thumb');
    }

    public function render()
    {
        return view('livewire.delivery-address.item');
    }
}
