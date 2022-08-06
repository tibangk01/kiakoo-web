<section id="info-cateroie">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <h2>Catégories populaires</h2>
            </div>
        </div>

        <div class="row">
            @forelse ($taxonomies as $taxonomy)

                @php
                    $image = $taxonomy->getFirstMedia('taxonomies');
                @endphp

                <div class="col-lg-4 col-sm-6 small-text-center col-xs-6">
                    <div class="col-lg-12 bg col-sm-12 col-xs-12">
                        <div class="col-lg-5 col-sm-4 col-xs-12">
                            <img src="{{ $image->getUrl('thumb') }}" alt="img" />
                        </div>
                        <div class="col-lg-7 col-sm-8 col-xs-12">
                            <h3>{{ $taxonomy->name }}</h3>
                            <a class="li" href="{{ route('taxonomy.show', $taxonomy->id) }}"><u>Voir les
                                    offres</u> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

            @empty

                <div class="col-lg-12 col-sm-12 small-text-center col-xs-12">
                    <div class="col-lg-12 bg col-sm-12 col-xs-12">
                        <div class="col-lg-12 col-sm-12 col-xs-12 text-center">
                            Pas d'enregistrements 😞
                        </div>
                    </div>
                </div>

            @endforelse

        </div>


        <div class="row">
            <div class="col-lg-12 hidden-xs tps col-sm-12 col-xs-12">
                <img class="fullwidth" src="{{ asset('kiakoo/images/ad-3.png') }}" alt="" />
            </div>
            <div class="col-lg-12 visible-xs tps col-sm-12 col-xs-12">
                <img class="fullwidth" src="{{ asset('kiakoo/images/ad-3-mobile.png') }}" alt="" />
            </div>
        </div>
    </div>
</section>
