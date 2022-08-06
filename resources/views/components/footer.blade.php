<section id="footer">

    <div class="container">

        <div class="row">

            <div class="col-lg-3 col-sm-3 col-xs-12">
                <h3>Catégorie</h3>
                <x-footer.taxonomies />
            </div>

            <div class="col-lg-3 col-sm-3 col-xs-12">
                <h3>FAQ</h3>
                <ul>
                    <li><a href="{{ route('delivery') }}">Livraison</a></li>
                    <li><a href="{{ route('about') }}">Qui sommes-nous ?</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                    <li><a href="{{ route('job') }}">Emplois</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-sm-3 col-xs-12">
                <h3>Service Clients</h3>
                <ul>
                    <li><a href="#">Mes commandes</a></li>
                    <li><a href="#">Mon compte</a></li>
                    <li><a href="{{ route('help') }}">Centre d'aide</a></li>
                </ul>
            </div>
            
            <div class="col-lg-3 flush-right space-small col-sm-3 col-xs-12">
                <h3>Nous contacter</h3>
                {{--
                    TODO: add kiakoo phone number in footer --}}

                <a class="tel" href="tel:+228 90909090"><i class="fa fa-phone"></i> Applez-nous</a>

                <h4>Service client</h4>

                <p>Ouvert les jours ouvrables de 08:00 à 21:00<br /> Ouvert les weekends de 08:00 à 18:00</p>

                <ul class="social">
                    {{--
                        TODO: add kiakoo social media --}}
                    <li><a href="www.facebook.com"><img src="{{ asset('kiakoo/images/Facebook.png') }}" alt="" /></a></li>
                    <li><a href="www.twitter.com"><img src="{{ asset('kiakoo/images/Twitter.png') }}" alt="" /></a></li>
                    <li><a href="www.youtube.com"><img src="{{ asset('kiakoo/images/Youtube.png') }}" alt="" /></a></li>
                </ul>

            </div>

        </div>

    </div>

</section>
