<div>

    @if (session('not_auth'))
        <script type="text/javascript">
            $('#loginModal').modal('show');
        </script>
    @endif

    @if (session('cart_empty'))
        <script type="text/javascript">
            $('#cartNotify').modal('show');
        </script>
    @endif

    {{-- Redirect user to appropriate view --}}
    @if (is_null(Auth::user()))

        <div class="col-lg-12 col-sm-12 col-xs-12">

            <a class="cont bluel" href="#" wire:click.prevent='command'>Commander</a>

        </div>

    @else

        @if (is_null(Auth::user()->customer->addresses->first()))

            <div class="col-lg-12 col-sm-12 col-xs-12">

                <a class="cont bluel" href="{{ route('delivery-address.create') }}">Commander</a>

            </div>

        @else

            <div class="col-lg-12 col-sm-12 col-xs-12">

                <a class="cont bluel" href="#" wire:click.prevent='command'>Commander</a>

            </div>

        @endif

    @endif

</div>
