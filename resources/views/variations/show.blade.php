<x-layouts.app>

    <x-variation.breadcrumb :variationId="$variation->id" />

    <section id="info-slide-sec">

        <div class="container">

            <div class="row">

                @if (session('variation_added'))

                    <div class="col-lg-12 col-sm-12 col-xs-12 text-center">

                        <div class="alert alert-info alert-dismissible" role="alert">

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>

                            L'article a été ajouté au panier. Merci de cliquer <strong><a href="{{ route('cart.index') }}" class="alert-link">ici</a></strong> pour accéder au panier.
                        </div>

                    </div>

                @endif

                <div class="col-lg-12 col-sm-12 col-xs-12">

                    <div class="col-lg-12 bg col-sm-12 col-xs-12">

                        <div class="col-lg-1 hidden-xs text-center flush-right col-sm-2 col-md-1 col-xs-12">
                            <div id="bx-pager">

                                @php
                                    $i = 0;
                                @endphp

                                @foreach ($variation->media as $image)
                                    <a data-slide-index="{{ $i++ }}" href=""><img
                                            src="{{ $image->getUrl('thumb') }}" alt="kiakoo-image" /></a>
                                @endforeach

                            </div>
                        </div>

                        {{-- Mobile --}}
                        <div class="col-lg-4 flush col-sm-6 col-xs-12">

                            <div class="col-lg-12 price-tag visible-xs lil col-sm-12 col-xs-12">
                                <h6 class="">
                                    {{ $variation->state->name }}<span>|</span>{{ $variation->units_sold }} vendus
                                    <span>|</span>{{ $variation->stock }} en stock
                                </h6>
                                <h2 class="">{{ $variation->name }}</h2>
                            </div>

                            <div class="col-lg-12 lil col-sm-12 col-xs-12">

                                <livewire:favorite.variation.toggle :variationId="$variation->id"/>

                                <a href="#"><i class="fa fa-share-alt"></i> <u>Partager</u></a>

                            </div>

                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <ul class="bxslider-product">
                                    @foreach ($variation->media as $image)
                                        <li><img src="{{ $image->getUrl('slides') }}" alt="kiakoo-image" /></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="col-lg-1 visible-xs text-center flush-right col-sm-12 col-xs-12">
                                <div id="bx-pager">

                                    @php
                                        $i = 0;
                                    @endphp

                                    @foreach ($variation->media as $image)
                                        <a data-slide-index="{{ $i++ }}" href=""><img
                                                src="{{ $image->getUrl('thumb') }}" alt="kiakoo-image" /></a>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-4 wid-1 flush col-sm-5 col-xs-12">

                            <div class="col-lg-12 price-tag col-sm-12 col-xs-12">

                                <h6 class="hidden-xs">
                                    {{ $variation->state->name }}<span>|</span>{{ $variation->units_sold }} vendus
                                    <span>|</span>{{ $variation->stock }} en stock
                                </h6>

                                <h2 class="hidden-xs">{{ $variation->name }}</h2>

                                @if ($variation->stock > 0 && $variation->discount !== null && $variation->discount->expires_at > now() && $variation->discount->quantity > 0)

                                    <p class="price">
                                        {{ round($variation->price - ($variation->price * $variation->discount->amount) / 100) }}
                                        Fcfa</p>

                                    @if ($variation->discount->is_daily_offer != null && $variation->discount->is_daily_offer == true)
                                        <span class="sold-out">OFFRE DU JOUR</span>
                                    @endif
                                    <h4><span class="s1">{{ $variation->price }} Fcfa</span> <span
                                            class="s2">-{{ $variation->discount->amount }}%</span></h4>
                                @else
                                    <h5 class="price">{{ $variation->price }} Fcfa</h5>

                                    @if ($variation->stock === 0)
                                        <span class="sold-out">EN RUPTURE DE STOCK</span>
                                    @endif

                                    <h4><span class="s1"
                                            style="text-decoration: none">{{ $variation->price }} Fcfa</span> <span
                                            class="s2">-0%</span></h4>
                                @endif

                                <livewire:variation.rating.avg :variationId="$variation->id"/>

                            </div>

                            {{-- variation properties --}}
                            <x-variation.properties :variationId="$variation->id" />

                            {{-- Promotions --}}
                            @if ($variation->discount !== null && $variation->discount->quantity > 0 && $variation->discount->expires_at > now())

                                @php
                                    $datas = [
                                        'quantities' => [
                                            'quantity' => $variation->discount->quantity,
                                            'quantity_used' => $variation->discount->quantity_used,
                                        ],
                                        'dates' => [
                                            'expiresAt' => $variation->discount->expires_at,
                                        ],
                                    ];
                                @endphp

                                <x-variation.promotion :datas="$datas" />

                            @endif

                        </div>

                        <div class="col-lg-3 wid-2 col-sm-3 col-xs-12">

                            <div class="col-lg-12 rt col-sm-12 col-xs-12">
                                <div class="col-lg-12 flush bt col-sm-12 col-xs-12">
                                    <div class="col-lg-3 icon-sp col-sm-3 col-xs-3">
                                        <img src="{{ asset('kiakoo/images/ic-1.png') }}" alt="">
                                    </div>
                                    <div class="col-lg-9 flush-left col-sm-9 col-xs-9">
                                        <h3>Livraison gratuite à Lome<br><span>Commandez et faites-vous livrer en moins
                                                de 24h</span></h3>
                                    </div>
                                </div>
                                <div class="col-lg-12 flush bt col-sm-12 col-xs-12">
                                    <div class="col-lg-3 icon-sp col-sm-3 col-xs-3">
                                        <img src="{{ asset('kiakoo/images/ic-2.png') }}" alt="">
                                    </div>
                                    <div class="col-lg-9 flush-left col-sm-9 col-xs-9">
                                        <h3>Service client<br><span>Notre service client est disponible 24/7 pour
                                                répondre à vos demandes</span></h3>
                                    </div>
                                </div>
                                <div class="col-lg-12 flush bt col-sm-12 col-xs-12">
                                    <div class="col-lg-3 icon-sp col-sm-3 col-xs-3">
                                        <img src="{{ asset('kiakoo/images/ic-3.png') }}" alt="">
                                    </div>
                                    <div class="col-lg-9 flush-left col-sm-9 col-xs-9">
                                        <h3>Bonne qualité<br><span>Faites de bonnes affaires en toute confiance chez
                                                Kiakoo</span></h3>
                                    </div>
                                </div>

                                <div class="col-lg-12 hidden-xs tts col-sm-12 col-xs-12">
                                    <h3>Quantité</h3>
                                </div>

                                {!! Form::open(['method' => 'POST', 'route' => 'cart.store', 'class' => 'form-horizontal']) !!}

                                <livewire:variation.add-to-basket :variationId="$variation->id" />


                                {!! Form::close() !!}

                            </div>
                            
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section id="info-desc">

        <div class="container">

            <div class="row">

                <div class="col-lg-12 col-sm-12 col-xs-12">

                    <div class="col-lg-12 bg col-sm-12 col-xs-12">
                        <div class="col-lg-12 hidden-xs col-sm-12 col-xs-12">
                            <h2>Description <i class="fa fa-angle-down"></i></h2>
                        </div>
                        <div class="col-lg-12 visible-xs col-sm-12 col-xs-12">
                            <a id="btn-1">
                                <h2>Description <i class="fa fa-angle-down"></i></h2>
                            </a>
                        </div>
                        <div id="div-acor-1" class="col-lg-12  col-sm-12 col-xs-12">
                            @php
                                echo $variation->description;
                            @endphp
                        </div>
                    </div>

                    <x-variation.spec :variationId="$variation->id" />

                </div>

            </div>

        </div>

    </section>


    <section id="info-comment">

        <div class="container">

            <div class="row">

                <div class="col-lg-12 col-sm-12 col-xs-12">

                    <div class="col-lg-12 bg col-sm-12 col-xs-12">

                        <div class="col-lg-12 hidden-xs col-sm-12 col-xs-12">

                            <h2>Avis et commentaires <i class="fa fa-angle-down"></i></h2>

                        </div>

                        <div class="col-lg-12 visible-xs col-sm-12 col-xs-12">

                            <a id="btn-3"><h2>Avis et commentaires <i class="fa fa-angle-down"></i></h2></a>

                        </div>

                        <div id="div-acor-3" class="col-lg-12 flush col-sm-12 col-xs-12">

                            <div class="col-lg-4 flush col-sm-4 col-xs-12">

                                <div class="col-lg-12 spr col-sm-12 col-xs-12">

                                    <livewire:comment.rating.average :variationId="$variation->id"/>

                                    <livewire:comment.rating.counts :variationId="$variation->id"/>

                                </div>

                            </div>


                            <div class="col-lg-8 flush col-sm-8 col-xs-12">

                                <livewire:comment.form.create :variationId="$variation->id"/>

                                <div class="col-lg-12 col-sm-12 col-xs-12">
                                    <hr />
                                </div>

                                <livewire:comment.all :variationId="$variation->id"/>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <x-variation.similar :variationId="$variation->id" />

</x-layouts.app>
