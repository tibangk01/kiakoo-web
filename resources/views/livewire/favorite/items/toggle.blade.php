<a
class="{{ $variation->favorites->pluck('user_id')->contains(Auth::id()) ? 'fa heart fa-heart' : 'fa heart fa-heart-o' }}"
href="#" wire:click.prevent="toggle"
>

@if (session('not_auth'))
<script type="text/javascript">
    $('#loginModal').modal('show');
</script>
@endif

</a>
