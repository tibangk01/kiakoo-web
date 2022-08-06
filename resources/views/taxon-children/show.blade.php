<x-layouts.app>

    <x-taxon-child.breadcrumb :taxonChildId="$taxonChild->id" />

    <section id="cate-info">

        <div class="container">

            <div class="row bt">

                <x-taxon-child.count :taxonChildId="$taxonChild->id" />

                <x-taxon-child.filter />

            </div>

            <div class="row bt">

                <x-taxon-child.search />

                <x-taxon-child.items  :taxonChildId="$taxonChild->id"/>

                <x-taxon-child.mobile.filter />

            </div>

        </div>

    </section>

</x-layouts.app>
