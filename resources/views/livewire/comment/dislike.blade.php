<span wire:click="dislike">

    @if (session('not_auth'))
        <script type="text/javascript">
            $('#loginModal').modal('show');
        </script>
    @endif

    <i class="fa fa-thumbs-o-down"></i>

    {{ $count }}

</span>
