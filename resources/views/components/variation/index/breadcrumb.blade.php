<section id="pagis" class="hidden-xs">

    <div class="container">

        <div class="row">

            <div class="col-lg-12 col-sm-12 col-xs-12">

                <p>
                    <a href="#">Accueil</a><i class="fa fa-angle-right"></i>
                    <a href="#">Liste des articles</a>
                </p>

            </div>

        </div>

    </div>

    @if (request()->filled('verified'))

        <div class="container">

            <div class="row">

                <div class="col-lg-12 col-sm-12 col-xs-12 text-center">

                    <div class="alert alert-info alert-dismissible" role="alert">

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>

                            👏 Votre adresse mail a été vérifiée. Merci !
                    </div>

                </div>

            </div>

        </div>

    @endif

    @if (session('payment_error'))

        <div class="container">

            <div class="row">

                <div class="col-lg-12 col-sm-12 col-xs-12 text-center">

                    <div class="alert alert-danger alert-dismissible" role="alert">

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>

                            😞 Oups! Une erreur s'est produite, veillez reésayer dans quelques minutes. Merci !
                    </div>

                </div>

            </div>

        </div>

    @endif

</section>
