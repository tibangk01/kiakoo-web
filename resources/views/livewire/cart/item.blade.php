<div class="col-lg-12 bd col-sm-12 col-xs-12">

    <div class="col-lg-3 imgs flush text-center col-sm-3 col-xs-2">
        <img src="{{ $image }}" alt="img" />
    </div>

    <div class="col-lg-9 flush col-sm-9 col-xs-10">

        <div class="col-lg-8 flush col-sm-8 col-xs-9">

            <div class="col-lg-12 col-sm-12 col-xs-12">

                <p>{{ $name }}</p>

            </div>

            <div class="col-lg-12 visible-xs col-sm-12 col-xs-12">

                <h5>{{ format_price(roundUp($price)) }} Fcfa</h5>

            </div>

            <div class="col-lg-12 col-sm-12 col-xs-12">

                <div class="numbers-row">

                    <div {{ session('status') ? 'disabled' : '' }} class="inc button" wire:click="increment">+</div>
                    <div {{ session('status') ? 'disabled' : '' }} class="dec button" wire:click="decrement">-
                    </div>

                    <input class="cart-qty-plus" readonly type="text" name="french-hens" id="french-hens"
                        value="{{ $qty }}">

                </div>

                @if (session('info'))
                    <span class="text-danger text-sm">{{ session('info') }}</span>
                @endif

            </div>

        </div>

        <div class="col-lg-4 flush text-right col-sm-4 col-xs-3">

            <div class="col-lg-12 hidden-xs col-sm-12 col-xs-12">
                <h5>{{ $qty }} * {{ format_price(roundUp($price))}} Fcfa</h5>
            </div>

            <div class="col-lg-12 icon col-sm-12 col-xs-12">

                <livewire:favorite.cart.toggle :variationId="$variationId"/>


                <a class="fa fa-trash-o" href="{{ route('cart.delete', $cartId) }}"></a>

            </div>

        </div>

        @if (!is_null($discount) &&
        $discount->quantity > 0)

            <div class="col-lg-12 col-sm-12 col-xs-12">

                <p>
                    <small>{{ $discount->quantity}} réductions de {{ $discount->amount }}%  disponible pour cet article*</small>
                </p>

                <p>
                    <small class="text-info">Total de la réduction : {{ roundUp($this->dv) }} Fcfa</small>
                </p>

            </div>

        @endif

    </div>

</div>
