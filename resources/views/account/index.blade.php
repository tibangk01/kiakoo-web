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

    <section id="info-lokosu">

        <div class="container">

            <div class="row">

                <div class="col-lg-10 column-centered none-small col-sm-12 col-xs-12">

                    <div class="col-lg-12 bg col-sm-12 col-xs-12">

                        <div class="col-lg-12 head col-sm-12 col-xs-12">

                            <h2>

                                <img width="60" height="60" src="{{ Auth::user()->getMedia('avatar')->first()->getUrl('thumb') }}" alt="img"  style="border-radius: 50%"/>

                                {{ Auth::user()->customer->human->first_name }} {{ Auth::user()->customer->human->last_name }}

                                <br/>

                                <a href="#" class="logout-button-custom">Déconnexion</a>

                            </h2>

                            <h6 id="btn-edit-avatar"> &nbsp;&nbsp; <a href="#" class="edit-avatar">Modifier</a></h6>

                        </div>

                        <div class="col-lg-12 hidden-xs col-sm-12 col-xs-12">
                            <hr/>
                        </div>

                        <div class="col-lg-12 o-hidden col-sm-12 col-xs-12">

                            <ul class="nav nav-pills">
                                <li class="active" ><a data-toggle="pill" href="#tab-1">Mes commandes</a></li>
                                <li><a data-toggle="pill" href="#tab-2">Mon compte</a></li>
                            </ul>
                            
                        </div>

                        <div class="col-lg-12 flush col-sm-12 col-xs-12">

                            <div class="tab-content">

                                <livewire:account.orders/>

                                <div id="tab-2" class="tab-pane fade">

                                    <div class="col-lg-12 col-sm-12 col-xs-12">
                                        Lorem
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</x-layouts.app>
