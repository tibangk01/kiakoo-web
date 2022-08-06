@if ($paginator->hasPages())
    <div class="col-lg-12 text-center pagi flush col-sm-12 col-xs-12">
        <ul>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                {{-- <li><a class="active">1</a></li> --}}
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" ><i
                            class="fa fa-angle-left"></i> Précédent</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li aria-current="page"><a class="active">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}">Suivant <i class="fa fa-angle-right"></i></a></li>
            @else
                {{-- <li><a class="lt" href="#"><i class="fa fa-angle-right"></i></a></li> --}}
            @endif

        </ul>
    </div>
@endif
