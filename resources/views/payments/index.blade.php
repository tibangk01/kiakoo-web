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

                        {{-- //TODO: check if user sets his address up  3... --}}

                        <li><a href="{{ route('cart.index') }}">Panier</a></li>

                        <li><img class="" src="{{ asset('kiakoo/images/line.png') }}" alt="" /></li>

                        <li><a href="{{ route('delivery-address.index') }}">Adresse de livraison</a></li>

                        <li><img class="" src="{{ asset('kiakoo/images/line.png') }}" alt="" /></li>

                        <li><a class="active" href="#">Paiement</a></li>

                    </ul>

                </div>

                <div class="col-lg-12 visible-xs col-sm-12 col-xs-12">

                    <a class="adre" href="{{ route('delivery-address.index') }}"><img
                            src="images/angle-left.png" alt="" /> Paiement</a>

                    <span> Étape 3/3</span>

                </div>

            </div>

        </div>

    </section>

    <section id="info-adres" class="paiement">

        <div class="container">

            <div class="row">

                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <h2>Paiement</h2>
                </div>

            </div>

            {!! Form::open(['method' => 'POST', 'route' => 'payment.store']) !!}

                <div class="row">

                    <div class="col-lg-8  col-sm-12 col-xs-12">

                            <div class="col-lg-12 bg col-sm-12 col-xs-12">
                                <div class="col-lg-12 flush col-sm-12 col-xs-12">
                                    <h3>Quel moyen de paiement voulez-vous utiliser?</h3>
                                </div>
                                <div id="paiement-1" class="col-lg-12 bd active col-sm-12 col-xs-12">
                                    <input class="paiement-1" type="radio" name="payment" value="0" checked/>
                                    <div class="col-lg-4 rr text-right small-text-left pull-right col-sm-4 col-xs-12">
                                        <img src="{{ asset('kiakoo/images/icon-money.png') }}" alt="" />
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-xs-12">
                                        <h3>Paiement à la livraison</h3>
                                        <p>Payez en espèces à la livraison. Le paiement se fait directement auprès du prestataire de livraison</p>
                                    </div>
                                </div>

                                <div id="paiement-2" class="col-lg-12 bd col-sm-12 col-xs-12">
                                    <input class="paiement-2" type="radio" name="payment" value="1" />
                                    <div class="col-lg-4 rr text-right small-text-left pull-right col-sm-4 col-xs-12">
                                        <a href="#"><img src="{{ asset('kiakoo/images/Tmoney-1.png') }}" alt=""></a>
                                        <a href="#"><img src="{{ asset('kiakoo/images/Frame-810.png') }}" alt=""></a>
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-xs-12">
                                        <h3>Paiement mobile</h3>
                                        <p>Payez rapidement et en toute sécurité avec vos solutions de paiments mobiles préférées (Flooz, T-Money) </p>
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

                                {{-- <a type="submit" class="cont bluel" href="#">Continuer</a> --}}
                                <a onclick="this.closest('form').submit(); return false;" class="cont bluel" href="#">Continuer</a>
                            </div>

                        </div>

                    </div>

                </div>


            {!! Form::close() !!}


        </div>

    </section>

</x-layouts.app>
