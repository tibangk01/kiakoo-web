<form wire:submit.prevent="check">

    <div class="col-lg-12 col-sm-12 col-xs-12">

        <label>Code promotionnel</label>

    </div>

    <div class="col-lg-8 col-sm-8 col-xs-8">

        <input type="text" wire:model="code" />

        @error('code')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

    <div class="col-lg-4 flush-left col-sm-4 col-xs-4">

        <input class="submit" type="submit" value="Appliquer" />

    </div>

    @if (session('empty_cart'))

        <div class="col-lg-12 col-sm-12 col-xs-12">

            <small class="text-info">{{ session('empty_cart') }}</small>

        </div>

    @endif

    @if (session('expired_code'))

        <div class="col-lg-12 col-sm-12 col-xs-12">

            <small class="text-danger">{{ session('expired_code') }}</small>

        </div>

    @endif

    @if (session('not_auth'))

        <script type="text/javascript">

            $('#loginModal').modal('show');

        </script>

    @endif

</form>
