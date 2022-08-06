<div>

    <div class="col-lg-12 dd col-sm-12 col-xs-12">

        <p>Total HT<span class="pull-right">{{ format_price(total_ht()) }} Fcfa</span></p>

        @if (discount_total() > 0)
            <p>Réduction offre du jour<span class="pull-right "> - {{ format_price(discount_total()) }} Fcfa</span>
            </p>
        @endif

        <p>Sous-total 1 <span class="pull-right">{{ format_price(subtotal_one()) }} Fcfa</span></p>

    </div>

    <div class="col-lg-12 col-sm-12 col-xs-12">
        <hr />
    </div>

    <div class="col-lg-12 dd col-sm-12 col-xs-12">

        @if (session('kiakoo_promocode') &&  promotion() > 0)
            <p>{{ session('kiakoo_promocode.code') }}{{ session('kiakoo_promocode.reward') }}%<span
                    class="pull-right "> - {{ format_price(promotion()) }} Fcfa</span></p>
        @endif

        <p>Sous-total 2 <span class="pull-right">{{ format_price(subtotal_two()) }} Fcfa</span></p>

        <p>TVA (18%) <span class="pull-right ">{{ format_price(tax()) }} Fcfa</span></p>

    </div>

    <div class="col-lg-12 col-sm-12 col-xs-12">
        <hr />
    </div>

    <div class="col-lg-12 dd total col-sm-12 col-xs-12">

        <p><b>Total</b> <span class="pull-right "><b>{{ format_price(total_final()) }} Fcfa</b></span></p>

    </div>

</div>
