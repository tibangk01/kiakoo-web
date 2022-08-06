<div>

    <div class="col-lg-3 flush-right col-sm-4 col-xs-3">
        <img src="{{ $image }}" alt="img" />
    </div>

    <div class="col-lg-9 col-sm-8 col-xs-9">

        <p>{{ $name }}<p>

        <h4>{{ format_price($price) }} Fcfa</h4>

        <h5>Quantité: <span>{{ $qty }}</span></h5>

    </div>

    <div class="col-lg-12 col-sm-12 col-xs-12">
        <hr/>
    </div>

</div>
