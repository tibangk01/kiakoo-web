<x-layouts.app>

    <x-taxon.breadcrumb :taxonId="$taxon->id" />

    <section id="cate-info">

        <div class="container">

            <div class="row bt">

                <x-taxon.count :taxonId="$taxon->id" />

                <x-taxon.filter :taxonId="$taxon->id" />

            </div>

            <div class="row bt">

                <x-taxon.search />

                <x-taxon.items :taxonId="$taxon->id"  />

                <x-taxon.mobile.filter />

            </div>

        </div>

    </section>

</x-layouts.app>
