<div class="col-lg-6 col-sm-5 col-xs-12">

    {!! Form::open(['method' => 'POST', 'route' => 'search.store']) !!}

        <div class="col-lg-12 bg col-sm-12 col-xs-12">

            <div class="col-lg-6 flush col-sm-5 col-xs-12">

                <input type="text" name="searchTerm" placeholder="Rechercher des produits ..." />

            </div>

            <div class="col-lg-5 flush col-sm-6 col-xs-12">

                <select name="taxonomy_id">

                    <option value="0">Toutes les catégories</option>

                    @foreach ($taxonomies as $taxonomy)

                        <option value="{{ $taxonomy->id }}">{{ $taxonomy->name }}</option>

                    @endforeach

                </select>

            </div>

            <div class="col-lg-1 flush col-sm-1 col-xs-12">
                <button class="submit btn-primary" type="submit"><img
                        src="{{ asset('kiakoo/images/search.png') }}" alt="" /></button>
            </div>

        </div>

    {!! Form::close() !!}

</div>
