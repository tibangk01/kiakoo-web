<a href="#" wire:click.prevent="trigerModal">Ici
    @if (session('showModal'))
        <script type="text/javascript">
            $('#editCommentModal').modal('show');
        </script>
    @endif

    @if (session('hideModal'))
        <script type="text/javascript">
            $('#editCommentModal').modal('hide');
        </script>
    @endif
</a>
