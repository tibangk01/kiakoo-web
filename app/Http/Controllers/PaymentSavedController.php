<?php

namespace App\Http\Controllers;

use App\Models\Order;

class PaymentSavedController extends Controller
{
    public function __invoke()
    {
        if (session('order_id')) {

            $order = Order::with(['transaction.transactionType'])
                ->where('id', session('order_id'))
                ->first();

            return view('payments.saved', [
                'order' => $order,
            ]);
            
        } else {

            return redirect()->route('account.index');
        }
    }
}
