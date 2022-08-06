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

                <div class="col-lg-10 column-centered col-sm-12 col-xs-12">

                    <div class="col-lg-12 bg col-sm-12 col-xs-12">

                        <div class="col-lg-12 col-sm-12 col-xs-12">

                            <h2><img src="images/icon-correct.png" alt="" /> Détails de votre commande N°
                                {{ $order->id }}</h2>

                        </div>

                        <div class="col-lg-12 col-sm-12 col-xs-12">

                            <p><span>Date:</span> {{ $order->created_at->translatedFormat('jS F Y \à H:i:s') }}</p>

                            <p ><span>Status de la commande:</span> <span>{{ $order->status->name }}</span></p>

                            <p><span>Montant:</span> {{ $order->total_final }} Fcfa</p>

                            <p><span>Moyen de paiement:</span> {{ $order->transaction->transactionType->name }}</p>

                            <p ><span>Status du paiement:</span> <span>{{ $order->transaction->status->name }}</span></p>

                        </div>

                        <div class="col-lg-6 tp col-sm-12 col-xs-12">
                            <a class="l-btn full" href="{{ route('account.index') }}">Retour à la liste de vos commandes</a>
                        </div>

                        <div class="col-lg-12 tp col-sm-12 col-xs-12">

                            <div class="table-responsive">

                                <table class="table table-bordered">

                                    <caption>Liste des articles de cette commande</caption>

                                    <thead>

                                        <tr>

                                            <th scope="col">#</th>

                                            <th scope="col">Dénomination</th>

                                            <th scope="col" >Quantité</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        @php
                                            $x = 1;
                                        @endphp

                                        @foreach ($order->variations as $variation)
                                            <tr>

                                                <th scope="row">{{ $x }}</th>

                                                <td>{{ $variation->name }}</td>

                                                <td style="text-align: center"> {{ $variation->pivot->qty }}</td>

                                            </tr>

                                            @php
                                                $x++;
                                            @endphp
                                        @endforeach

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</x-layouts.app>
