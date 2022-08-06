<a href="#" wire:click.prevent="toggle">

    @if (session('not_auth'))
        <script type="text/javascript">
            $('#loginModal').modal('show');
        </script>
    @endif

    <i class="{{ $variation->favorites->pluck('user_id')->contains(Auth::id())? 'fa heart fa-heart': 'fa heart fa-heart-o' }}"></i>

    @if ($this->variation->favorites->pluck('user_id')->contains(Auth::id()))

        <u>Retirer au favoris</u>

    @else

    <u>Ajouter au favoris</u>

    @endif

</a>
