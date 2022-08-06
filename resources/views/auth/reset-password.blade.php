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

                <div class="col-lg-6 column-centered col-sm-12 col-xs-12 text-center x">
                    <span>Recupération de mot de passe</span>
                </div>

                <div class="col-lg-6 column-centered col-sm-12 col-xs-12">

                    @if (session('success'))
                        <div class="col-lg-12 col-sm-12 bgx col-xs-12 text-center">

                            Reinitialisation effectuée. Connecter vous <a href="#" class="login">ici</a>

                        </div>
                    @endif


                    @if (session('error'))
                        <div class="col-lg-12 col-sm-12 bgx col-xs-12 text-center">

                            <span class="text-danger">Erreur interne. Reéssayer plus tard.</span>

                        </div>
                    @endif

                    @if (session('expired'))
                        <div class="col-lg-12 col-sm-12 bgx col-xs-12 text-center">

                            Votre session a expirée. Renvoyer un nouveau lien <a href="#"
                                class="forgot text-danger text-bold">ici</a>

                        </div>
                    @endif

                    <div class="col-lg-12 bg col-sm-12 col-xs-12">

                        <form class="form-x-content form-x" action="{{ route('password.update') }}" method="POST">

                            @csrf

                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <label>Email</label>
                                <input type="text" name="email" value="{{ old('email', $request->email) }}">
                                <div class="text-danger mb-10"> {{ $errors->first('email') }}</div>

                            </div>

                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <label>Nouveau mot de passe</label>
                                <input type="password" name="password" placeholder="Nouveau mot de passe">
                                <div class="text-danger mb-10">{{ $errors->first('password') }}</div>
                            </div>

                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <label>Confirmation du nouveau mot de passe</label>
                                <input type="password" name="password_confirmation"
                                    placeholder="Confirmaiton du nouveau mot de passe">
                                <div class="text-danger mb-10">{{ $errors->first('password_confirmation') }}</div>
                            </div>

                            <div class="col-lg-12 text-center col-sm-12 col-xs-12">
                                <input class="submit" type="submit" value="Valider" />
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

</x-layouts.app>
