<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show(Order $order)
    {
        return view('orders.show', [
            'order' => $order->load(['variations']),
        ]);
    }
}
