<x-layouts.app>

    <x-search.breadcrumb />

    <section id="cate-info">

        <div class="container">

            <div class="row bt">

                {{-- <x-search.count :taxonomyId="$taxonomyId" :searchTerm="$searchTerm"/> --}}
                <x-search.count/>

                <x-search.filter />

            </div>

            <div class="row bt">

                <x-search.search />

                <x-search.items />

                <x-search.mobile.filter />

            </div>

        </div>

    </section>

</x-layouts.app>
