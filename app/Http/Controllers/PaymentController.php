<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Order;
use App\Models\Status;
use App\Models\Currency;
use App\Models\Discount;
use App\Models\Variation;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Gabievi\Promocodes\Facades\Promocodes;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payments.index');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $currency = Currency::firstOrCreate(['name' => 'FCFA']);

            $user = Auth::user();
            $user->load('redeemers');

            $customer = $user->customer;

            $status = Status::firstOrCreate([
                'name' => 'Commande enregistrée',
                'is_for_order' => true,
            ]);

            $total_ht = total_ht();
            $delivery_price = shipping_cost();
            $promotion_discount = promotion();
            $day_offer_discount = discount_total();
            $tax = tax();
            $total_final = total_ttc();

            $order = Order::create([
                'identifier' => mb_substr(uniqid(date('YmdHis') . $user->id ), 0, 25),
                'customer_id' => $customer->id,
                'currency_id' => $currency->id,
                'status_id' =>  $status->id,
                'total_ht' => $total_ht,
                'day_offer_discount' => $day_offer_discount,
                'promotion_discount' => $promotion_discount,
                'delivery_price' => $delivery_price,
                'tax' => $tax,
                //'total_final' => $total_final,
                'total_final' => 1,
            ]);

            $carts = Cart::instance('default')->content();

            $carts->map(function ($cart) {

                return [
                    $cart->id, [
                        'qty' => $cart->qty,
                        'unit_price' => $cart->price,
                        'discount' => (float) $cart->options->discount //Important to avoid array to string conversion 😃
                    ]
                ];

            })->each(function ($cart) use ($order) {

                $order->variations()->attach([$cart[0] => $cart[1]]);

            });

            // deal with promocodes:
            if (session('kiakoo_promocode')) {

                if (Promocodes::check(session('kiakoo_promocode.code'))) {

                    $user->redeemCode(session('kiakoo_promocode.code'));

                }

            }

            // deal with variation qtys:
            $carts->map(function($cart){

                $variation = Variation::find($cart->id);

                $variation->decrement('stock', $cart->qty);

                $variation->increment('units_sold', $cart->qty);

            });

            // discounts
            $cartIds = $carts->map(function ($cart) {

                return $cart->id;

            })->flatten();

            $variationsWithDiscount = Variation::with('discount')->where(function ($q) use ($cartIds) {

                $q->whereIn('id', $cartIds);

            })->get();

            // format db data:
            $filterVariationsWithValidDiscount = $variationsWithDiscount->reject(function ($variation) {

                return $variation->discount == null || $variation->discount->quantity == 0;

            })->map(function ($variation) {

                return [
                    'variation_id' => $variation->id,
                    'discount_id' => $variation->discount->id,
                    'quantity' => $variation->discount->quantity,
                    'quantity_used' => $variation->discount->quantity_used,
                ];

            });

            //format cart data:
            $cartCollection = $carts->map(function ($cart) {

                return [
                    'variation_id' => $cart->id,
                    'quantity' => $cart->qty,
                ];

            });

            // update discounts:
            $cartCollection->each(function ($cartItem) use ($filterVariationsWithValidDiscount, $user) {

                $variations = $filterVariationsWithValidDiscount;

                $variation = $variations->where('variation_id', $cartItem['variation_id']);

                if ($variation->isNotEmpty()) {

                    $variation = $variation->first();

                    $discount = Discount::find($variation['discount_id']);

                    if ($discount->quantity >= (int) $cartItem['quantity']) {

                        $redeemQty = $cartItem['quantity'];

                        $q = $discount->quantity - (int) $cartItem['quantity'];
                        $qu = $discount->quantity_used + $cartItem['quantity'];

                        $discount->update([
                            'quantity' => $q,
                            'quantity_used' => $qu,
                        ]);

                    } else {

                        $redeemQty = $discount->quantity;

                        $q = 0;
                        $qu = $discount->quantity_used + $discount->quantity;

                        $discount->update([
                            'quantity' => $q,
                            'quantity_used' => $qu,
                        ]);

                    }

                    // mark redeemer:
                    $user->redeemers()->create([
                        'discount_id' => $discount->id,
                        'quantity' => $redeemQty,
                        'redeemed_at' => now(),
                    ]);
                }
            });

            /** 0 => cashes transactions,
             * 1 => electronic transaction **/
            $transaction = null;

            if ((int) $request->payment === 0) {

                $status = Status::firstOrCreate([
                    'name' => 'En attente du paiement',
                    'is_for_order' => 1,
                ]);

                $transationType = TransactionType::firstOrCreate([
                    'name' => 'Paiement à la livraison'
                ]);

                $transaction = Transaction::create([
                    'transaction_type_id' => $transationType->id,
                    'status_id' => $status->id,
                    'order_id' => $order->id,
                    'amount' => total_final(),
                ]);

                Cash::create([
                    'transaction_id' => $transaction->id,
                ]);

                Cart::destroy();

                session()->forget('kiakoo_promocode');

                DB::commit();

                return redirect()->route('payment.show', $order);

            } elseif ((int) $request->payment === 1) {

                $status = Status::firstOrCreate([
                    'name' => 'En cours',
                    'is_for_order' => 0,
                ]);

                $transationType = TransactionType::firstOrCreate([
                    'name' => 'Paiement mobile',
                ]);

                $transaction = Transaction::create([
                    'transaction_type_id' => $transationType->id,
                    'status_id' => $status->id,
                    'order_id' => $order->id,
                    'amount' => total_final(),
                ]);

                /** paygate area */
                $token = config('kiakoo.paygateglobal.token');
                $paygateUrl = config('kiakoo.paygateglobal.url');

                $amount = (int) $order->total_final;
                $description = "Commande d'articles";

                $identifier = $order->identifier;

                $returnUrl = route('payment.saved');
                $phone = $user->customer->phone_number;

                $queryString = [
                    "token={$token}",
                    "amount={$amount}",
                    "description={$description}",
                    "identifier={$identifier}",
                    "url={$returnUrl}",
                    "phone={$phone}",
                ];

                $payGate = $paygateUrl . implode('&', $queryString);

                /** return url session variable*/
                session(['order_id' => $order->id]);

                Cart::destroy();

                session()->forget('kiakoo_promocode');

                DB::commit();

                return redirect($payGate);
            }

            return redirect()->route('home');

        } catch (\Throwable $e) {

            //TODO: remove the error message when finished
            //dd($e->getMessage());

            DB::rollBack();

            session()->flash('payment_error', true);

            return redirect()->route('variation.index');
        }
    }

    public function show(Order $order)
    {
        if(Auth::id() != $order->customer->user_id)
            abort(404);

        return view('payments.show',[
            "order" => $order->load('transaction.transactionType')
        ]);
    }
}
