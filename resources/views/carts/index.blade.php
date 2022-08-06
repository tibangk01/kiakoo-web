<x-layouts.app>

    <section id="" class="hidden-xs">

        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12 flush col-sm-12 col-xs-12">

                    <img class="fullwidth" src="{{ asset('kiakoo/images/ad.png') }}" alt="img" />

                </div>

            </div>

        </div>

    </section>

    <section id="panier">

        <div class="container">

            <div class="row">

                <div class="col-lg-12 hidden-xs text-center col-sm-12 col-xs-12">

                     {{-- //TODO: check if user sets his address up  2... --}}

                    <ul>

                        <li><a class="active" href="{{ route('cart.index') }}">Panier</a></li>

                        <li><img class="" src="{{ asset('kiakoo/images/line.png') }}" alt="img" /></li>


                        @if (is_null(Auth::user()))

                            <li><a href="#">Adresse de livraison</a></li>

                        @else

                            @if ( is_null( Auth::user()->customer->addresses->last() ) )

                                <li><a href="{{ route('delivery-address.create') }}">Adresse de livraison</a></li>

                            @else

                            <li><a href="{{ route('delivery-address.index') }}">Adresse de livraison</a></li>


                            @endif

                        @endif

                        <li><img class="" src="{{ asset('kiakoo/images/line.png') }}" alt="img" /></li>


                        @if (is_null(Auth::user()))

                            <li><a href="#">Paiement</a></li>

                        @else

                            @if (is_null( Auth::user()->customer->addresses->last() ))

                                <li><a href="{{ route('delivery-address.create') }}">Paiement</a></li>

                            @else

                                <li><a href="{{ route('payment.index') }}">Paiement</a></li>

                            @endif

                        @endif

                    </ul>

                </div>

                <div class="col-lg-12 visible-xs col-sm-12 col-xs-12">

                    <a class="adre" href="#"><img src="{{ asset('kiakoo/images/angle-left.png') }}" alt="" /> Panier</a>

                    <span> Étape 1/3</span>

                </div>

            </div>

        </div>

    </section>

    {{-- //TODO: show promocode apply success message --}}

    <section id="info-adres" class="panier">

        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-sm-12 col-xs-12">

                    <livewire:cart.info/>

                    <div class="col-lg-12 bg left col-sm-12 col-xs-12">

                        @forelse (Cart::instance('default')->content() as $item)

                            <livewire:cart.item :item="$item"/>

                        @empty

                            <div class="text-center">

                                <a class="cont-x bluel" href="{{ route('variation.index') }}">Continuer les achats</a>

                            </div>

                        @endforelse

                    </div>

                </div>

                <div class="col-lg-4 rt col-sm-7 pull-right col-xs-12">

                    <div class="col-lg-12 bg col-sm-12 col-xs-12">

                        <livewire:cart.apply-promocode/>

                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <hr/>
                        </div>

                        <livewire:cart.total/>

                        <livewire:cart.command/>

                    </div>

                </div>

            </div>

        </div>

    </section>

</x-layouts.app>
