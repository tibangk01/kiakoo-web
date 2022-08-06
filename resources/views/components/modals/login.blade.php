<div id="loginModal" class="modal form-modal home-models fade" role="dialog">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title">Connexion
                    <button type="button" class="close" data-dismiss="modal">
                        <img src="{{ asset('kiakoo/images/icon-close.png') }}" alt="close" />
                    </button>
                </h4>

            </div>

            <div class="modal-body">

                {!! Form::open(['method' => 'POST', 'route' => 'login', 'id' => 'login_form']) !!}

                    <div class="col-lg-12 text-center col-sm-12 col-xs-12 modal-msg-custom">
                        <span class="email-verify"></span>
                    </div>

                    <div class="col-lg-12 col-sm-12 col-xs-12">

                        <label>Email<span>*</span></label>
                        <input type="text" name="email" placeholder="Ex: johndoe@gmail.com" />

                        <div class="col-lg-12 col-sm-12 col-xs-12 modal-msg-mt-fix">
                            <span class="error-text email_error"></span>
                        </div>

                    </div>


                    <div class="col-lg-12 col-sm-12 col-xs-12">

                        <label>Mot de passe<span>*</span></label>
                        <input type="password" name="password" placeholder="Mot de passe" />

                        <div class="col-lg-12 col-sm-12 col-xs-12 modal-msg-mt-fix">
                            <span class="error-text password_error"></span>
                        </div>

                    </div>


                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <a class="li forgot" href="#">Mot de passe oublié ?</a>
                    </div>

                    {{-- <div class="col-lg-12 col-sm-12 col-xs-12">
                        <a class="li" href="#" class="verify">Email non vérifiée ?</a>
                    </div> --}}

                    <div class="col-lg-12 text-center col-sm-12 col-xs-12">
                        <input class="submit" type="submit" value="Se Connecter" />
                    </div>

                    <div class="col-lg-12 down text-center col-sm-12 col-xs-12">
                        <p>Nouveau client ? <a href="#" class="register">Inscivez-vous</a></p>
                    </div>

                {!! Form::close() !!}

            </div>

        </div>

    </div>

</div>
