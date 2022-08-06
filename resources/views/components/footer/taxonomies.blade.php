<ul>

    @foreach ($taxonomies as $taxonomy)

        <li><a href="{{ route('taxonomy.show', $taxonomy) }}">{{ $taxonomy->name }}</a></li>

    @endforeach

</ul>
