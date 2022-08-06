<div>

    <a class="active" href="#" wire:click.prevent='purchase'>
        <img src="{{ asset('kiakoo/images/shopping-basket.png') }}" alt="" />Acheter maintenant
    </a>

    @if (session('not_auth'))
        <script type="text/javascript">
            $('#loginModal').modal('show');
        </script>
    @endif

</div>
