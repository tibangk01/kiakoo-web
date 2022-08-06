<section id="topbar">

    <div class="container">

        <div class="row">

            <div class="col-lg-2 visible-xs log col-sm-12 col-xs-7">
                <a id="menu-btn"><img src="{{ asset('kiakoo/images/icon-menu.png') }}" alt="menu" /></a>
            </div>

            <div class="col-lg-2 hidden-xs log col-sm-2 col-xs-7">
                <a href="/"><img class="logo" src="{{ asset('kiakoo/images/logo.png') }}" alt="" /></a>
            </div>

            <div class="col-lg-4 visible-xs text-right col-sm-12 col-xs-5">

                <ul>
                    <li>
                        <p>
                            <img class="al" src="{{ asset('kiakoo/images/person-outline.png') }}" alt="" />
                        </p>
                    </li>
                    <li>
                        <p>
                            <img class="al" src="{{ asset('kiakoo/images/heart.png') }}" alt="" />
                        </p>
                    </li>
                    <li>
                        <p>
                            <img class="al" src="{{ asset('kiakoo/images/cart.png') }}" alt="" />
                        </p>
                    </li>
                </ul>

            </div>

            <x-search.box/>

            <div class="col-lg-4 hidden-xs text-center col-sm-5 pull-right col-xs-12">

                <ul>

                    @if (Auth::user())
                        <li>
                            <p class="ft">

                                <img class="al" src="{{ asset('kiakoo/images/person-outline.png') }}"
                                    alt="" />

                                <a href="{{ route('account.index') }}" class="fw-900">
                                    Mon compte
                                </a>
                                <br>

                                <a href="#" class="logout-button-custom fw-900">
                                    Déconnexion
                                </a>

                            </p>
                        </li>
                    @else
                        <li>
                            <p class="ft">

                                <img class="al" src="{{ asset('kiakoo/images/person-outline.png') }}"
                                    alt="" />


                                <a href="#" class="login fw-900">
                                    Connexion
                                </a>
                                <br>
                                <a href="#" class="register fw-900">
                                    Inscription
                                </a>


                            </p>
                        </li>
                    @endif

                    <li>

                        <p>

                            <a href="{{ route('favorite') }}">
                                <img class="al" src="{{ asset('kiakoo/images/heart.png') }}"
                                    alt="" /><br />
                                <span>Favoris</span>
                            </a>

                        </p>

                    </li>

                    <livewire:top-bar.basket />

                </ul>

            </div>

        </div>

    </div>

</section>
