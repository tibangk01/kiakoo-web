@if ($variations->count() > 0)

    <section id="info-product">

        <div class="container">

            <div class="row">

                <div class="col-lg-8 flush column-centered col-sm-12 col-xs-12">

                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <h2>Produits similaires</h2>
                    </div>

                    @foreach ($variations as $variation)

                        @php

                            $image = $variation->getFirstMedia('variations');

                        @endphp

                        <div class="col-lg-4 col-sm-4 col-xs-12">

                            <div class="col-lg-12 bg col-sm-12 col-xs-12 cols-equal-height">

                                <a href="{{ route('variation.show', $variation) }}">

                                    <div class="col-lg-12 text-center flush col-sm-12 col-xs-5">

                                        <img src="{{ $image->getUrl('thumb') }}" alt="img" />

                                    </div>

                                    <div class="col-lg-12 s-left-small flush col-sm-12 col-xs-7">

                                        @if (!is_null($variation->discount) && $variation->discount->is_daily_offer == true)

                                            <h6>OFFRE DU JOUR</h6>

                                        @else

                                            <br>

                                        @endif

                                        <p>{{ $variation->name }}</p>

                                        @if (!is_null($variation->discount) && $variation->discount->expires_at >= now() && $variation->discount->quantity > 0)

                                        <h5>{{ roundUp($variation->price - ($variation->price * $variation->discount->amount) / 100) }} Fcfa</h5>

                                            <h4><span class="s1">{{ $variation->price }} Fcfa</span> <span
                                                    class="s2">-{{ $variation->discount->amount }}%</span>
                                            </h4>

                                        @else

                                            <h5>{{ roundUp($variation->price) }} Fcfa</h5>
                                            <h4><span class="s1"
                                                    style="text-decoration: none">{{ roundUp($variation->price) }}
                                                    Fcfa</span> <span class="s2">-0%</span></h4>
                                        @endif

                                    </div>

                                </a>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </section>

@endif
