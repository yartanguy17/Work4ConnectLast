<!doctype html>
<html lang="en">

<head>

    <!-- Basic Page Needs
================================================== -->
    <title>À propos | Centralresource</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="{{ asset('assets/website/images/cr-logo-website.png') }}" type="image/gif" sizes="64x64">

    <!-- CSS
================================================== -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&amp;display=swap&amp;subset=latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/website/css/all.min.css') }}">
    <link href="{{ asset('assets/website/css/aos.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/website/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/website/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/website/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/css/color-1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/btn.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/css/sticky-menu.css') }}">
</head>

<body>

    <!-- Header 01
================================================== -->
    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->

            <div class="header_btm">
                <h2>À propos</h2>
            </div>
        </div>
    </header>

    <!-- Main
================================================== -->
    <main>
        <ul id="sticky-menu" class="list-unstyled" role="menu">
            <li role="menuitem">
                <a id="menu2" href="{{ route('etre_rappele') }}" class="orange" data-touch-count="0"
                    title="Être rappelé">
                    <span class="sticky-menu-text">Être rappelé</span>
                    <span aria-hidden="true" class="o2icon o2icon-cta-rappel fa fa-phone"></span>
                </a>
            </li>
            <li role="menuitem">
                <a id="menu3" href="{{ route('demander_devis') }}" class="yellow" data-touch-count="0"
                    title="Prendre contact">
                    <span class="sticky-menu-text"> Demander un devis</span>
                    <span aria-hidden="true" class="o2icon o2icon-devis fa fa-envelope"></span>
                </a>
            </li>
            <li role="menuitem">
                <a id="menu3" href="{{ route('offers') }}" class="yellow" data-touch-count="0"
                    title="Poste">

                    <span class="sticky-menu-text"> Postes disponibles </span>
                    <span aria-hidden="true" class="o2icon o2icon-devis fa fa-eye"></span>
                </a>
            </li>
        </ul>
        <div class="simple_page">
            <div class="container ">
                <div class="row">

                    <div class="user_elements_box">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Présentation</h4>

                                <p> Nos intervenants sont sélectionnés avec le plus grand soin grâce à un processus
                                    rigoureux et exigeant.
                                    Tout comme Eloïse, garde d’enfants, Julien, assistant de vie ou encore Nadia, femme
                                    de ménage,
                                    tous nos salariés sont recrutés en CDI. Ils bénéficient d’une formation continue qui
                                    est au cœur
                                    du savoir-faire. Leur mission au quotidien ? Votre satisfaction !
                                </p>
                            </div>

                            <div class="col-md-6">
                                <img alt="" class="" src="
                                    {{ asset('assets/website/images/about_us.jpg') }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="category-how-work-sec">
                            <h4>Comment ça marche?</h4>

                            <p>Nous vous proposons un processus simple en 2 étapes pour trouver des prestataires </p>
                            <ul class="how-work-box">
                                <li>
                                    <div class="hwb-icon">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <div class="hwb-cont">
                                        <h5>S'inscrire</h5>
                                        <p> Inscrivez vous selon que vous soyez une personne désireuse d'embaucher du
                                            personnel ou une personne proposant des services </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="hwb-icon">
                                        <i class="far fa-thumbs-up"></i>
                                    </div>
                                    <div class="hwb-cont">
                                        <a  href="{{ route('offers') }}">
                                            <h5>Rechercher le profil de prestataires que vous souhaitez</h5>

                                        </a>
                                           <p>Si vous cherchez à embaucher du personnel, servez-vous de notre module de
                                            recherche pour trouver exactement la personne dont vous avez besoin !</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up"></i></button>
    <!-- Footer Container
================================================== -->

    @include('website.partials.footer')

    <!-- End Footer Container
================================================== -->

    <!-- Scripts
================================================== -->
    <script src="{{ asset('assets/website/js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript">
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>
    <script src="{{ asset('assets/website/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/aos.js') }}"></script>
    <script src="{{ asset('assets/website/js/custom.js') }}"></script>
</body>

</html>
