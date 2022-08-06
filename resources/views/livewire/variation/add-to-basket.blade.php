<div>

    <style>
        .a-disable {
            pointer-events: none;
        }
    </style>

    <div class="col-lg-12 hidden-xs col-sm-12 col-xs-12">

        <div class="numbers-row">

            <a wire:click="increment" class="inc button  {{ session('status') !== null ? 'a-disable' : '' }}">+</a>
            <a wire:click="decrement" class="dec button  {{ session('status') !== null ? 'a-disable' : '' }}">-</a>

            <input type="text" name="qty" value="{{ $qty }}" readonly>
            <input type="hidden" name="variationId" value="{{ $variationId }}">

        </div>

        @if (session('status'))
            <p class="text-danger text-sm text-bold">{{ session('status') }}</p>
        @endif

        @if (session('info'))
            <p class="text-danger text-sm text-bold">{{ session('info') }}</p>
        @endif

    </div>

    @if ($variationStock != 0)

        <div class="col-lg-12 hidden-xs qts-btn text-center col-sm-12 col-xs-12">


            <livewire:variation.purchase :variationId="$variationId" :qty="$qty" key="{{ 'purchase_'. now().'_'.$variationId }}"/>

            <button class="lts" type="submit">Ajouter au panier</button>

        </div>
    @endif

</div>
