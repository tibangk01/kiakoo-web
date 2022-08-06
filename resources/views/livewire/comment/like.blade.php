<span wire:click="like">

    @if (session('not_auth'))
        <script type="text/javascript">
            $('#loginModal').modal('show');
        </script>
    @endif

    <i class="fa fa-thumbs-o-up"></i>

    {{ $count ? $count : 0 }}

</span>
