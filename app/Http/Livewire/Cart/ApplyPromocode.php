<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Gabievi\Promocodes\Models\Promocode;
use Gloudemans\Shoppingcart\Facades\Cart;
use Gabievi\Promocodes\Facades\Promocodes;

class ApplyPromocode extends Component
{
    public $code;

    protected $rules = [
        'code' => ['required', 'max:32'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.cart.apply-promocode');
    }

    public function check()
    {
        $this->validate();
        
        if (Cart::count() == 0) {
            session()->flash('empty_cart', 'Veillez ajouter des articles au panier.');
        } else {

            if (session('not_auth'))
            session()->forget('not_auth');

            if (is_null(Auth::user())) {
                $this->code = '';
                session()->flash('not_auth', true);
            } else {

                if (session('expired_code'))
                    session()->forget('expired_code');

                $this->code = trim($this->code);
                $promocode = Promocodes::check($this->code);

                if ($promocode === false) {

                    $code = Promocode::where('code', $this->code)->first();

                    if ($code) {
                        session()->flash(
                            'expired_code',
                            "La limite d'utilisation de ce code promomotionnel est atteinte"
                        );
                    } else {
                        session()->flash(
                            'expired_code',
                            "Ce code promomotionnel est incorrect"
                        );
                    }

                } else {
                    session([
                        'kiakoo_promocode' => [
                            'code' => $promocode->code,
                            'reward' => (int)$promocode->reward,
                        ]
                    ]);

                    return redirect()->route('cart.index');
                }
            }
        }
    }
}
