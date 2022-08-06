<?php

namespace App\Http\Controllers;

use App\Models\Variation;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        return view('carts.index');
    }

    public function store(Request $request)
    {
        $variation = Variation::findOrFail($request->variationId);
        $variationId = $variation->id;

        $cart = Cart::search(function ($cart) use ($variationId) {
            return $cart->id == $variationId;
        })->first();

        if (empty($cart)) {
            Cart::add($variation, $request->qty, [
                'options' => ['discount' => 0]
            ]);

            session()->flash('variation_added', true);

            return redirect()->back();
        }

        $qty = $cart->qty;

        if (($cart->qty + $request->qty) <= $variation->stock) {
            $qty = $cart->qty + $request->qty;
        } else {
            $qty = $variation->stock;
        }

        Cart::update($cart->rowId, $qty);

        session()->flash('variation_added', true);

        return redirect()->back();
    }

    public function delete($cartId)
    {
        Cart::remove($cartId);

        return redirect()->route('cart.index');
    }

    //TODO: vider le panier
}
