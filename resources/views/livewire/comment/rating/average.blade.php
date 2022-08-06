<div class="col-lg-7 ins small-text-left text-center col-sm-10 col-xs-12">

    <h3>{{ number_format($avg, 2, '.', ' ') }}</h3>

    @php
        $tab = kiakoo_stars($avg);
    @endphp

    <p>
        <a class="{{ $tab[1] }}" href="#"></a>
        <a class="{{ $tab[2] }}" href="#"></a>
        <a class="{{ $tab[3] }}" href="#"></a>
        <a class="{{ $tab[4] }}" href="#"></a>
        <a class="{{ $tab[5] }}" href="#"></a>
    </p>

</div>
