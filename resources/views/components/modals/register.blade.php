<div id="registerModal" class="modal form-modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Inscription <button type="button" class="close"
                        data-dismiss="modal"><img src="{{ asset('kiakoo/images/icon-close.png') }}" alt="" /></button>
                </h4>
            </div>

            <div class="modal-body">

                {!! Form::open(['method' => 'POST', 'route' => 'register', 'id' => 'register_form']) !!}

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-lg-12 text-center col-sm-12 col-xs-12 modal-msg-custom">
                            <span class="registred"></span>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-6 col-sm-6 col-xs-12">

                            <label>Nom et prénom<span>*</span></label>
                            <input type="text" name="fullname" placeholder="Ex: John Doe" />

                            <div class="col-lg-12 col-sm-12 col-xs-12 modal-msg-mt-fix">
                                <span class="error-text fullname_error"></span>
                            </div>

                        </div>

                        <div class="col-lg-6 col-sm-6 col-xs-12">

                            <label>Téléphone</label>
                            <input type="text" name="phone_number" placeholder="Ex: 99999999" />

                            <div class="col-lg-12 col-sm-12 col-xs-12 modal-msg-mt-fix">
                                <span class="error-text phone_number_error"></span>
                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-6 col-sm-6 col-xs-12">

                            <label>Email<span>*</span></label>
                            <input type="text" name="email" placeholder="Ex: johndoe@gmail.com" />

                            <div class="col-lg-12 col-sm-12 col-xs-12 modal-msg-mt-fix">
                                <span class="error-text email_error"></span>
                            </div>

                        </div>

                        <div class="col-lg-6 col-sm-6 col-xs-12">

                            <label>Mot de passe<span>*</span>  <span style="color: black; font-size:16px;" onclick="togglePassword()" ><i id="tgl" class="fa fa-eye-slash"></i></span></label>
                            <input type="password" name="password" id="password" placeholder="Mot de passe" />

                            <div class="col-lg-12 col-sm-12 col-xs-12 modal-msg-mt-fix">

                                <span class="error-text password_error"></span>
                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12 text-center col-sm-12 col-xs-12">
                            <input class="submit" type="submit" value="S’inscrire" />
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12 down text-center col-sm-12 col-xs-12">
                            <p>Déjà client ? <a href="#" class="login">Connectez-vous</a></p>
                        </div>

                    </div>

                </div>

                {!! Form::close() !!}

            </div>

        </div>

    </div>

</div>
