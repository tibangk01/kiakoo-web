<section id="pagis" class="hidden-xs">

    <div class="container">

        <div class="row">

            <div class="col-lg-12 col-sm-12 col-xs-12">

                <p>
                    <a href="/">Accueil</a><i class="fa fa-angle-right"></i>
                    <a href="{{ route('taxonomy.show', $taxonomy->id) }}">{{ $taxonomy->name }}</a><i class="fa fa-angle-right"></i>
                    <a href="{{ route('taxon.show', $taxon->id) }}">{{ $taxon->name }}</a><i class="fa fa-angle-right"></i>
                    <a href="{{ route('taxon-child.show', $taxonChild->id) }}">{{ $taxonChild->name }}</a>
                </p>

            </div>

        </div>

    </div>

</section>
