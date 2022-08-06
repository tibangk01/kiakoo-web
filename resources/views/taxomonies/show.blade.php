<x-layouts.app>

    <x-taxonomy.breadcrumb :taxonomyId="$taxonomy->id" />

    <section id="cate-info">

        <div class="container">

            <div class="row bt">

                <x-taxonomy.count :taxonomyId="$taxonomy->id" />

                <x-taxonomy.filter />

            </div>

            <div class="row bt">

                <x-taxonomy.search />

                <x-taxonomy.items :taxonomyId="$taxonomy->id" />

                <x-taxonomy.mobile.filter />

            </div>

        </div>

    </section>

</x-layouts.app>
