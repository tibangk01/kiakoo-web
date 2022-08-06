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

                    <ul>

                        <li><a href="{{ route('cart.index') }}">Panier</a></li>

                        <li><img class="" src="{{ asset('kiakoo/images/line.png') }}" alt="" /></li>

                        <li><a class="active" href="#">Adresse de livraison</a></li>

                        <li><img class="" src="{{ asset('kiakoo/images/line.png') }}" alt="" /></li>

                        <li><a href="{{ route('payment.index') }}">Paiement</a></li>

                    </ul>

                </div>

                <div class="col-lg-12 visible-xs col-sm-12 col-xs-12">

                    <a class="adre" href="{{ route('delivery-address.index') }}">

                        <img src="{{ asset('kiakoo/images/angle-left.png') }}" alt="" /> Adresse de livraison</a>

                    <span> Étape 2/3</span>

                </div>

            </div>

        </div>

    </section>

    <section id="info-adres" class="adre-2">

        <div class="container">

            @if (session('address_added'))

                <div class="row">

                    <div class="col-lg-12 col-sm-12 col-xs-12 text-center">

                        <div class="alert alert-info alert-dismissible" role="alert">

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>

                                👏 L'adresse de livraison a été correctement enregistrée. Merci !
                        </div>

                    </div>

                </div>

            @endif

            <div class="row">

                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <h2>Adresse de livraison</h2>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-8  col-sm-12 col-xs-12">

                    <div class="col-lg-12 bg left col-sm-12 col-xs-12">

                        <div class="col-lg-12 bd col-sm-12 col-xs-12">

                            <div class="col-lg-12 flush col-sm-12 col-xs-12">

                                <div class="col-lg-8 col-sm-8 col-xs-12">
                                    <h3>{{ $userInfos['first_name'] . ' ' . $userInfos['last_name'] }}</h3>

                                    <p>Quartier: {{ $userInfos['district'] }} <br> Adresse:
                                        {{ $userInfos['address'] }} <br> Téléphone: {{ $userInfos['phone_number'] }}
                                    </p>

                                </div>

                                <div class="col-lg-4 small-text-left text-right col-sm-4 col-xs-12">
                                    <a class="modi edit-address" href="#">Modifier</a>
                                </div>

                            </div>

                        </div>

                        <div class="col-lg-12 flush dd col-sm-12 col-xs-12">

                            <p>Total HT<span class="pull-right">{{ format_price(total_ht()) }} Fcfa</span></p>

                            @if (discount_total() > 0)
                                <p>Réduction offre du jour<span class="pull-right "> -
                                        {{ format_price(discount_total()) }} Fcfa</span></p>
                            @endif

                            <p>Sous-total 1<span class="pull-right ">{{ format_price(subtotal_one()) }} Fcfa</span>
                            </p>

                        </div>

                        <div class="col-lg-12 flush col-sm-12 col-xs-12">
                            <hr />
                        </div>

                        <div class="col-lg-12 flush dd total col-sm-12 col-xs-12">

                            @if (session('kiakoo_promocode') && promotion() > 0)
                                <p>{{ session('kiakoo_promocode.code') }}{{ session('kiakoo_promocode.reward') }}%<span
                                        class="pull-right "> - {{ format_price(promotion()) }} Fcfa</span></p>
                            @endif

                            <p>Sous-total 2 <span class="pull-right ">{{ format_price(subtotal_two()) }}
                                    Fcfa</span></p>

                            <p>TVA (18%) <span class="pull-right ">{{ format_price(tax()) }} Fcfa</span></p>

                        </div>

                        <div class="col-lg-12 flush col-sm-12 col-xs-12">
                            <hr />
                        </div>

                        <div class="col-lg-12 flush dd total col-sm-12 col-xs-12">
                            <p><b>Total</b> <span class="pull-right "> <b>{{ format_price(total_final()) }}
                                        Fcfa</b></span></p>
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

                            {{-- //TODO: frais de livraison offert 2 --}}
                            <p>Frais de livraison<span class="pull-right">{{ format_price(shipping_cost()) }} Fcfa</span></p>

                        </div>

                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <hr />
                        </div>

                        <div class="col-lg-12 dd total col-sm-12 col-xs-12">

                            <p><b>Total TTC </b> <span class="pull-right "><b>{{ format_price(total_ttc()) }}
                                        Fcfa</b></span></p>

                        </div>

                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <a class="cont bluel" href="{{ route('payment.index') }}">Continuer</a>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</x-layouts.app>
