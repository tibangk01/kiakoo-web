@isset($datas)

    @if ($datas->first() !== null)

        <li class="dropdown mega-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $datas->first()->name ?? '' }} <b
                    class="fa fa-angle-down"></b></a>

            <div class="dropdown-menu ">

                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <h2><a
                            href="{{ route('taxonomy.show', $datas->first()->id) }}">{{ $datas->first()->name ?? '' }}</a>
                    </h2>
                </div>

                @foreach ($datas->first()->taxons as $taxon)

                    <div class="col-lg-4 col-sm-4 col-xs-12">

                        <h3><a href="{{ route('taxon.show', $taxon->id) }}">{{ Str::ucfirst($taxon->name) }}</a></h3>

                        <ul>

                            @foreach ($taxon->taxonChildren as $taxonChild)

                                <li><a
                                        href="{{ route('taxon-child.show', $taxonChild) }}">{{ Str::ucfirst(Str::lower($taxonChild->name)) }}</a>
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endforeach

            </div>
        </li>

    @endif

@endisset
