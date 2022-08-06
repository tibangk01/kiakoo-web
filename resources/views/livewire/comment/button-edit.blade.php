<a href="#" wire:click.prevent="trigerModal" class="btn btn-sm btn-primary">Modifier
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
