<div id="forgotModal" class="modal form-modal home-models fade" role="dialog">
    <div class="modal-dialog ">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">

                    <a href="#" class="forgot-back">
                        <img src="{{ asset('kiakoo/images/arrow-back-outline.png') }}" alt="" />
                    </a>

                    <button type="button" class="close" data-dismiss="modal">
                        <img src="{{ asset('kiakoo/images/icon-close.png') }}" alt="" />
                    </button>
                </h4>
            </div>
            <div class="modal-body">

                {!! Form::open(['method' => 'POST', 'route' => 'password.email', 'id' => 'password_email']) !!}

                <div class="col-lg-12 text-center col-sm-12 col-xs-12 modal-msg-custom">
                    <span class="password-sent"></span>
                </div>


                    <div class="col-lg-12 dds col-sm-12 col-xs-12">
                        <h2>Réinitialisez votre mot de passe</h2>
                        <p>Veuillez saisir votre adresse e-mail. Vous recevrez un lien par e-mail pour créer un
                            nouveau mot de passe.</p>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <label>Email<span>*</span></label>
                        <input type="text" name="email"/>
                        <div class="col-lg-12 col-sm-12 col-xs-12 modal-msg-mt-fix">
                            <span class="error-text email_error"></span>
                        </div>
                    </div>

                    <div class="col-lg-12 text-center col-sm-12 col-xs-12">
                        <input class="submit" type="submit" value="Réinitialiser" />
                    </div>


                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
