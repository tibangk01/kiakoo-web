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

                    {{-- //TODO: check if user sets his address up ... --}}

                    <ul>

                        <li><a href="{{ route('cart.index') }}">Panier</a></li>

                        <li><img class="" src="{{ asset('kiakoo/images/line.png') }}" alt="" /></li>

                        <li><a class="active" href="#">Adresse de livraison</a></li>

                        <li><img class="" src="{{ asset('kiakoo/images/line.png') }}" alt="" /></li>

                        @if ( is_null( Auth::user()->customer->addresses->last() ) )

                            <li><a href="#">Paiement</a></li>

                        @else

                            <li><a href="{{ route('payment.index') }}">Paiement</a></li>

                        @endif

                    </ul>

                </div>

                <div class="col-lg-12 visible-xs col-sm-12 col-xs-12">

                    <a class="adre" href="{{ route('delivery-address.index') }}"><img
                            src="{{ asset('kiakoo/images/angle-left.png') }}" alt="" /> Adresse de livraison</a>

                    <span> Étape 2/3</span>

                </div>

            </div>

        </div>

    </section>

    <section id="info-adres">

        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <h2>Adresse de livraison</h2>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-8 text-center col-sm-12 col-xs-12  add-address">

                    <div class="col-lg-12 bg col-sm-12 col-xs-12">

                        <div class="col-lg-12 bd col-sm-12 col-xs-12">

                            <div class="col-lg-12 flush col-sm-12 col-xs-12">

                                <img src="{{ asset('kiakoo/images/grp.png') }}" alt="" />

                            </div>

                            <div class="col-lg-12 flush col-sm-12 col-xs-12">

                                <a class="link">Cliquez ici pour ajouter une adresse de livraison</a>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4 rt col-sm-7 pull-right col-xs-12">

                    <div class="col-lg-12 bg col-sm-12 col-xs-12">

                        <div class="col-lg-12 col-sm-12 col-xs-12">

                            <h2>Mon panier ({{ Cart::count() }} produits) <a class="hidden-xs"
                                    href="{{ route('cart.index') }}">Retour au panier</a></h2>

                        </div>

                        @forelse (Cart::instance('default')->content() as $item)
                            <livewire:delivery-address.item :item="$item" />

                        @empty

                            <p class="text-center">Pas d'articles dans le panier</p>
                        @endforelse

                        <div class="col-lg-12 dd col-sm-12 col-xs-12">

                            <p>Sous-total<span class="pull-right">{{ format_price(total_final()) }} Fcfa</span>
                            </p>

                            {{-- //TODO: frais de livraison offert --}}
                            <p>Frais de livraison<span class="pull-right">{{ format_price(shipping_cost()) }}
                                    Fcfa</span></p>

                        </div>

                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <hr />
                        </div>

                        <div class="col-lg-12 dd total col-sm-12 col-xs-12">

                            <p><b>Total TTC </b> <span class="pull-right "><b>{{ format_price(total_ttc()) }}
                                        Fcfa</b></span></p>

                        </div>

                        <div class="col-lg-12 col-sm-12 col-xs-12">

                            @if (is_null(Auth::user()->customer->addresses->first()))

                                <a class="cont bluel" href="#">Continuer</a>

                            @else

                                <a class="cont bluel" href="{{ route('payment.index') }}">Continuer</a>

                            @endif

                        </div>

                    </div>

                </div>


            </div>

        </div>

    </section>

</x-layouts.app>
