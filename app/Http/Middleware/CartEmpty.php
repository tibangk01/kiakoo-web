<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartEmpty
{
    /** redirect to variations page when cart empty
     *  end user visit delivery address, payment pages */
    public function handle(Request $request, Closure $next)
    {
        if(Cart::instance('default')->count() == 0)
            return redirect()->route('variation.index');

        return $next($request);
    }
}
