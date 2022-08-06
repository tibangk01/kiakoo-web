@if ($variations->isNotEmpty())

    <section id="info-product" class="home product">

        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <h2>Produits similaires</h2>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12 flush col-sm-12 col-xs-12">

                    <div class="col-lg-12 col-sm-12 col-xs-12">

                        <ul class="bxslider-product-home">

                            @foreach ($variations as $variation)

                                @php
                                    $image = $variation->getFirstMedia('variations');
                                @endphp

                                <li>

                                    <div class="col-lg-12 bg col-sm-12 col-xs-12">

                                        <a href=" {{ route('variation.show', $variation) }}">

                                            <div class="col-lg-12 text-center flush col-sm-12 col-xs-12">
                                                <img src="{{ $image->getUrl('thumb') }}" alt="img" />
                                            </div>

                                            <div class="col-lg-12 flush col-sm-12 col-xs-12">

                                                @if ($variation->stock > 0 && $variation->discount !== null && $variation->discount->expires_at > now() && $variation->discount->quantity > 0)

                                                    <p>{{ $variation->name }}

                                                        @if (strlen($variation->name) <= 30)
                                                            <br> <br>
                                                        @endif
                                                    </p>

                                                    <h5>{{ $variation->price }} Fcfa</h5>

                                                    <h4><span
                                                            class="s1">{{ round($variation->price - ($variation->price * $variation->discount->amount) / 100) }}
                                                            Fcfa</span> <span
                                                            class="s2">-{{ $variation->discount->amount }}%</span>
                                                    </h4>

                                                @else

                                                    <p>{{ $variation->name }}
                                                        @if (strlen($variation->name) <= 30)
                                                            <br> <br>
                                                        @endif
                                                    </p>

                                                    <h5>{{ $variation->price }} Fcfa</h5>

                                                    <h4><span class="s1"
                                                            style="text-decoration: none">{{ $variation->price }}
                                                            Fcfa</span> <span class="s2">-0%</span></h4>

                                                @endif

                                            </div>

                                        </a>

                                    </div>

                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </section>

@else
<section id="info-product" class="home product"><div class="container"></div></section>
@endif
