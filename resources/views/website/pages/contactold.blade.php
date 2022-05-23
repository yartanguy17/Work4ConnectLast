<!doctype html>
<html lang="en">

<head>

    <!-- Basic Page Needs
================================================== -->
    <title>Contact | Centralresource</title>
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
    {!! NoCaptcha::renderJs() !!}
</head>

<body>
    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->
            <div class="header_btm">
                <h2>Contactez-nous</h2>
            </div>
        </div>
    </header>
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
        </ul>
        <div class="only-form-pages">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class=" contact_us">
                            <div class="row ">
                                <div class="col-md-12 col-lg-6 ">
                                    <div class="newslatter_outer">
                                        <div>
                                            <h5>Adresse:</h5>
                                            <ul>
                                                <li><i class="fas fa-map-marker-alt"></i>
                                                    Keas 69 Str. 15234, Chalandri <br>
                                                    Lomé, <b>Togo</b>
                                                </li>
                                                <li><a href="tel:#"><i class="fas fa-phone"></i> +30-2106019311
                                                        (Fixe)</a></li>
                                                <li><a href="tel:#"><i class="fas fa-phone"></i> +30-6977664062
                                                        (Mobile)</a></li>
                                                <li><a href="tel:#"><i class="fas fa-envelope"></i>
                                                        info@centralresource.net</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <form class="newsletter" action="{{ route('newsletters.store') }}"
                                        method="POST">
                                        @csrf
                                        <h5>Newsletter</h5>
                                        <div class="d-flex">
                                            <input class="form-control" type="email">
                                            <input class="btn btn-primary" type="submit" value="Souscrire">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="only-form-box">
                                        @include('website.inc.messages')
                                        <form action="{{ route('postcontact') }}" method="POST">
                                            @csrf
                                            <div class="com_class_form">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="name" size="40"
                                                        placeholder="Nom">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="firstname" size="40"
                                                        placeholder="Prénom(s)">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="email" name="email"
                                                        placeholder="E-mail">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="phone_number"
                                                        size="40" placeholder="Téléphone">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="subject"
                                                        placeholder="Sujet">
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" name="message" cols="40" rows="3"
                                                        placeholder="Message"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    {!! app('captcha')->display() !!}
                                                    @if ($errors->has('g-recaptcha-response'))
                                                        <span class="help-block text-danger">
                                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <input class="btn btn-primary" type="submit" value="Envoyer">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
