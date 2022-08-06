<div class="col-lg-9 flush col-sm-8 col-xs-12">

    @forelse ($variations as $variation)

        <div class="col-lg-4 col-sm-6 col-xs-12">

            <div class="col-lg-12 items bg-white col-sm-12 col-xs-12">

                <div class="element ol-lg-12 hidden-xs text-center col-sm-12 col-xs-12">

                    <ul class="bxslider-mobile">

                        @foreach ($variation->media as $image)
                            <li><img src="{{ $image->getUrl('thumb') }}" alt="img" /></li>
                        @endforeach

                    </ul>

                    <a class="fa heart fa-heart-o" href="#"></a>

                </div>

                <div class="col-lg-12 spr col-sm-12 col-xs-12">

                    @php
                        $image = $variation->getFirstMedia('variations');
                    @endphp

                    <div class="col-lg-12 visible-xs text-center flush col-sm-12 col-xs-5">

                        <img src="{{ $image->getUrl('thumb') }}" alt="img">

                    </div>

                    <a href="{{ route('variation.show', $variation) }}">

                        <div class="col-lg-12 hidden-xs flush col-sm-12 col-xs-7">

                            {{--
                                TODO:reformat name display correctly
                            --}}

                            <p>{{ $variation->name }}

                                {{-- @if (strlen($variation->name) <= 30)
                                    <br> <br>
                                @endif --}}
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

        <div class="col-lg-4 col-sm-6 col-xs-12">

            Pas encore d'enrgistrements.

        </div>

    @endforelse

    {{ $variations->links('partials.pagination') }}

</div>
