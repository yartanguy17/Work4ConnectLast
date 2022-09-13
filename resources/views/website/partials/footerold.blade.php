<footer id="colophon" class="site-footer custom_footer dark_footer">
    <div class="container">
        <div class="row footer_widget">
            
            <div class="col-md-3">
                <div class="footer_widget_box">
                    <h2 data-aos="fade-up" data-aos-delay="400">Clients</h2>
                    <ul data-aos="fade-in" data-aos-delay="200">
                        <li>
                            <a href="{{ route('login') }}">Trouver prestataire</a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}">Tableau de bord</a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}">Mettre à jour profil</a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}">Changer mot de passe</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer_widget_box">
                    <h2 data-aos="fade-up" data-aos-delay="400">Communauté</h2>
                    <ul data-aos="fade-in" data-aos-delay="200">
                        <li> <a href="{{ route('contact') }}">Aide / Contactez-nous</a>
                        </li>
                        <li> <a href="{{ route('charte') }}">Charte éthique</a>
                        </li>
                        <li> <a href="{{ route('terms') }}">Conditions d'utilisation</a>
                        </li>
                        <li> <a href="{{ route('policy') }}">Politique de Confidentialité </a>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="col-md-3">
                <div class="footer_widget_box">
                    <h2 data-aos="fade-up" data-aos-delay="400">Suivez-nous</h2>
                    <ul data-aos="fade-in" data-aos-delay="200" class="social_list">
                        <li> <a href="https://twitter.com/CentralResourc1"><i class="fab fa-twitter"
                                    target="_blank"></i></a>
                        </li>
                        <li> <a href="https://www.facebook.com/centralresourceofficiel/" target="_blank"><i
                                    class="fab fa-facebook"></i></a>
                        </li>
                        <li> <a href="#"><i class="fab fa-linkedin" target="_blank"></i></a>
                        </li>
                        <li> <a href="https://www.youtube.com/channel/UCv7cB5OOEAU4lgMoUFkF1pg" target="_blank"><i
                                    class="fab fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>

                <div class="footer_widget_box">
                    {{-- @include('website.inc.messages') --}}
                    <form class="newsletter" action="{{ route('newsletters.store') }}" method="POST">
                        @csrf
                        <h2 data-aos="fade-up" data-aos-delay="400">Newsletter</h2>
                        <div data-aos="fade-in" data-aos-delay="200" class="d-flex">
                            <input class="form-control" type="email" placeholder="Entrer votre email" name="email"
                                required>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12">
                <div class="footer_widget_box">
                    <p class="copyright-text">© Copyright 2021. Développé par <a href="https://sparkcorporation.org"
                            target="_blank">SPARK CORPORATION</a>. Tous droits reservés.
                    </p>
                </div>
            </div>
        </div>
        <!-- .site-info -->
    </div>
</footer>
