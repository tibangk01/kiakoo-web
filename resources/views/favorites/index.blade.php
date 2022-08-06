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

    <section id="pagis" class="hidden-xs">

        <div class="container">

            <div class="row">

                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <p>
                        <a href="{{ route('home') }}">Accueil</a><i class="fa fa-angle-right"></i>
                        <a href="#" class="active">Articles favoris</a>
                    </p>
                </div>

            </div>

        </div>

    </section>

    <section id="cate-info">

        <div class="container">

            <div class="row bt">

                <div class="col-lg-12 flush col-sm-12 col-xs-12">

                    @forelse ($variations as $variation)

                    <div class="col-lg-3 col-sm-3 col-xs-12">

                        <div class="col-lg-12 items bg-white col-sm-12 col-xs-12 cols-equal-height">

                            <div class="col-lg-12 hidden-xs text-center col-sm-12 col-xs-12">

                                <ul class="bxslider-mobile">

                                    @foreach ($variation->media as $image)
                                        <li><img src="{{ $image->getUrl('thumb') }}" alt="img" /></li>
                                    @endforeach

                                </ul>

                                <livewire:favorite.items.toggle :variationId="$variation->id"/>

                            </div>

                            <div class="col-lg-12 spr col-sm-12 col-xs-12">
                                <div class="col-lg-12 visible-xs text-center flush col-sm-12 col-xs-5">
                                    <img src="{{ $image->getUrl('thumb') }}" alt="img">
                                </div>

                                <a href="{{ route('variation.show', $variation) }}">
                                <div class="col-lg-12 hidden-xs flush col-sm-12 col-xs-7">
                                    <p>{{ $variation->name }}

                                        @if (strlen($variation->name) <= 30)
                                            <br> <br>
                                        @endif

                                    </p>

                                    @if ($variation->discount !== null && $variation->discount->expires_at > now() && $variation->discount->quantity_used < $variation->discount->quantity)

                                    <h5>{{ round($variation->price - ($variation->price * $variation->discount->amount) / 100) }}
                                        Fcfa</h5>

                                    <h4><span class="s1">{{ $variation->price }} Fcfa</span> <span
                                            class="s2">-{{ $variation->discount->amount }}%</span></h4>

                                    @else

                                        <h5>{{ $variation->price }} Fcfa</h5>
                                        <h4><span class="s1" style="text-decoration: none">{{ $variation->price }}
                                                Fcfa</span> <span class="s2">-0%</span></h4>

                                    @endif

                                </div>
                                </a>


                                <div class="col-lg-12 s-left-small visible-xs flush col-sm-12 col-xs-7">

                                    @if ($variation->discount !== null && $variation->discount->expires_at > now() && $variation->discount->quantity_used < $variation->discount->quantity)

                                        @if ($variation->discount->is_daily_offer == true)

                                            <h6 class="visible-xs">OFFRE DU JOUR</h6>

                                        @endif

                                        <h5>{{ round($variation->price - ($variation->price * $variation->discount->amount) / 100) }}
                                            Fcfa</h5>

                                        <h4><span class="s1">{{ $variation->price }} Fcfa</span> <span
                                                class="s2">-{{ $variation->discount->amount }}%</span></h4>

                                    @else

                                        <h5>{{ $variation->price }} Fcfa</h5>
                                        <h4><span class="s1" style="text-decoration: none">{{ $variation->price }}
                                                Fcfa</span> <span class="s2">-0%</span></h4>

                                    @endif

                                    <p>{{ $variation->name }}</p>

                                </div>

                            </div>

                        </div>

                    </div>

                    @empty

                        <div class="col-lg-12 col-sm-12 col-xs-12 text-center">

                            Pas encore d'articles favoris.
                        </div>


                    @endforelse

                    {{ $variations->links('partials.pagination') }}


                </div>


                {{--
                    TODO: mobile favorite filter --}}

                <div class="col-lg-12 text-center filter-btn visible-xs col-sm-12 col-xs-12">
                    <div class="col-lg-6 bbdr col-sm-6 col-xs-6">
                        <a data-toggle="modal" data-target="#myModal"><img src="images/img-ar.png" alt="" /> Trier</a>
                    </div>
                    <div class="col-lg-6  col-sm-6 col-xs-6">
                        <a data-toggle="modal" data-target="#myModal-filter-big"><img src="images/icon-filter-blue.png" alt="" /> Filtrer</a>
                    </div>
                </div>

            </div>

        </div>

    </section>

</x-layouts.app>
