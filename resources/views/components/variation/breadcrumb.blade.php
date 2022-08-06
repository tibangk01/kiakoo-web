<section id="pagis">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 hidden-xs col-sm-12 col-xs-12">
                <p>
                    <a href="{{ route('home') }}">Accueil</a><i class="fa fa-angle-right"></i>
                    <a href="{{ route('taxonomy.show', $taxonomy) }}">{{ Str::ucfirst($taxonomy->name) }}</a><i
                        class="fa fa-angle-right"></i>
                    <a href="{{ route('taxon.show', $taxon) }}">{{ Str::ucfirst($taxon->name) }}</a><i
                        class="fa fa-angle-right"></i>
                    <a href="{{ route('taxon-child.show', $taxonChild) }}">{{ Str::ucfirst($taxonChild->name) }}</a><i
                        class="fa fa-angle-right"></i>
                    <a class="active"
                        href="{{ route('variation.show', $variation) }}">{{ Str::ucfirst($variation->name) }}</a>
                </p>
            </div>
            <div class="col-lg-12 visible-xs col-sm-12 col-xs-12">
                <p>
                    <a href="{{ route('variation.show', $variation) }}"><img
                            src="{{ asset('kiakoo/images/angle-left.png') }}" alt="" />
                        &nbsp;&nbsp;{{ Str::ucfirst($variation->name) }}</a>
                </p>
            </div>
        </div>
    </div>
</section>
