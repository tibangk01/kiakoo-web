<a
wire:click.prevent="toggle"
class="{{ $variation->favorites->pluck('user_id')->contains(Auth::id()) ? 'fa heart-x fa-heart' : 'fa fa-heart-o' }}"
href="#">

    @if (session('not_auth'))
        <script type="text/javascript">
            $('#loginModal').modal('show');
        </script>
    @endif

</a>


