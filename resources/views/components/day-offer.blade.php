<section id="info-product" class="home">

    <div class="container">

        @if ($discounts != [])

            <div class="row">

                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <h2>Offres du jour</h2>
                </div>

                <div class="col-lg-12 visible-xs flush col-sm-12 col-xs-12">

                    @foreach ($discounts as $discount)

                        <div class="col-lg-4 col-sm-4 col-xs-12">
                            <div class="col-lg-12 bg col-sm-12 col-xs-12">
                                <a href="{{ route('variation.show', $discount->discountable) }}">
                                    <div class="col-lg-12 text-center flush col-sm-12 col-xs-5">
                                        <img src="{{ $discount->discountable->getFirstMedia('variations')->getUrl('thumb') }}"
                                            alt="" />
                                    </div>
                                    <div class="col-lg-12 s-left-small flush col-sm-12 col-xs-7">
                                        <h6>OFFRE DU JOUR</h6>
                                        <h5>{{ round($discount->discountable->price - ($discount->discountable->price * $discount->amount) / 100) }}
                                            Fcfa</h5>
                                        <h4><span class="s1">{{ $discount->discountable->price }}
                                                Fcfa</span> <span
                                                class="s2">-{{ $discount->amount }}%</span></h4>
                                        <p>{{ $discount->discountable->name }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                    @endforeach


                    <div class="col-lg-12 text-center col-sm-12 col-xs-12">
                        <div class="col-lg-12 bts text-center col-sm-12 col-xs-12">
                            <a class="l-btn" href="{{ route('variation.index') }}">Voir tous les produits
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-12 hidden-xs flush col-sm-12 col-xs-12">

                    <div class="col-lg-12 col-sm-12 col-xs-12">

                        <ul class="bxslider-product-home">

                            @foreach ($discounts as $discount)

                                <li>
                                    <a href="{{ route('variation.show', $discount->discountable) }}">

                                        <div class="col-lg-12 bg col-sm-12 col-xs-12 cols-equal-height">
                                            <div class="col-lg-12 text-center flush col-sm-12 col-xs-12">
                                                <img src="{{ $discount->discountable->getFirstMedia('variations')->getUrl('thumb') }}"
                                                    alt="img" />
                                            </div>
                                            <div class="col-lg-12 flush col-sm-12 col-xs-12">
                                                <h6>OFFRE DU JOUR</h6>
                                                <p>{{ $discount->discountable->name }}
                                                </p>
                                                <h5>{{ round($discount->discountable->price - ($discount->discountable->price * $discount->amount) / 100) }}
                                                    Fcfa</h5>

                                                <h4><span class="s1">{{ $discount->discountable->price }}
                                                        Fcfa</span> <span
                                                        class="s2">-{{ $discount->amount }}%</span></h4>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                            @endforeach

                        </ul>

                    </div>

                    <div class="col-lg-12 bts text-center col-sm-12 col-xs-12">
                        <a class="l-btn" href="{{ route('variation.index') }}">Voir tous les produits </a>
                    </div>

                </div>

            </div>

        @endif

        <div class="row">
            <div class="col-lg-6 bt text-center col-sm-6 col-xs-12">
                <img class="fullwidth" src="{{ asset('kiakoo/images/les-1.png') }}" alt="" />
            </div>
            <div class="col-lg-6 bt text-center col-sm-6 col-xs-12">
                <img class="fullwidth" src="{{ asset('kiakoo/images/les-2.png') }}" alt="" />
            </div>
        </div>

    </div>

</section>
