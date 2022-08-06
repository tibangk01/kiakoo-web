<x-layouts.app>

    <section id="" class="hidden-xs">

        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12 flush col-sm-12 col-xs-12">
                    <img class="fullwidth" src="{{ asset('kiakoo/images/ad.png') }}" alt="img" />
                </div>

            </div>

        </div>

    </section>

    <section id="info-merci">

        <div class="container">

            <div class="row">

                <div class="col-lg-8 column-centered col-sm-12 col-xs-12">

                    <div class="col-lg-12 bg col-sm-12 col-xs-12">

                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <h2><img src="{{ asset('kiakoo/images/icon-correct.png') }}" alt="" /> Merci. Votre commande a été reçue.</h2>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-xs-12">

                            <p><span>Numéro de commande : </span> {{ $order->id }}</p>

                            <p><span>Date: </span> {{ $order->created_at->translatedFormat('jS F Y \à H:s:i')}}</p>

                            <p><span>E-mail: </span> {{ Auth::user()->email }}</p>

                            <p><span>Total: </span> {{ format_price($order->total_final) }} Fcfa</p>

                            <p><span>Moyen de paiement: </span> {{ $order->transaction->transactionType->name }}</p>

                        </div>

                        <div class="col-lg-6 tp col-sm-12 col-xs-12">
                            <a class="l-btn full" href="{{ route('order.show', $order) }}">Suivre votre commande</a>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <x-payment.similar :orderId="$order->id"/>

</x-layouts.app>
