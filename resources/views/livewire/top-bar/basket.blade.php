<li>
    <p>
        <a href="{{ route('cart.index') }}">

            <img class="al" src="{{ asset('kiakoo/images/cart.png') }}"
                alt="" /><span class="num">{{ Cart::count() }}</span><br />
            <span>Panier</span>
        </a>
    </p>
</li>
