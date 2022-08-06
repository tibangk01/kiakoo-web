<?php

namespace App\Http\Livewire\Account;

use App\Models\Order;
use Livewire\Component;

class Orders extends Component
{
    public $searchTerm = '';

    public function render()
    {
        $orders = Order::with(['status', 'variations'])
            ->orderBy('id', 'DESC')
            ->get();

        return view('livewire.account.orders', [
            'orders' => $orders,
        ]);
    }
}
