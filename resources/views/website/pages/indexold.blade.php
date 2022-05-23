<!doctype html>
<html lang="en">

<head>

    <!-- Basic Page Needs
================================================== -->
    <title>Acceuil | Centralresource</title>
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
    <header class="header_01">
        <div class="header_main">

            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->

            <div class="header_btm">
                <div class="container">
                    <div class="banner_slider ">
                        <div class="___class_+?5___">
                            <div class="row align-items-center">
                                <div class="col-lg-5" data-aos="fade-down" data-aos-delay="200">
                                    <h2>Embauchez du personnel <br> de qualité en 3 minutes.</h2>
                                    <p>Nous nous occupons de tous les détails pour vous.</p>
                                    <a class="btn btn-primary {{ Request::routeIs('about') ? 'current_page' : '' }}"
                                        href="{{ route('about') }}">Nous découvrir
                                        <i class="material-icons"></i>
                                    </a>
                                    <a class="btn btn-primary"
                                    href="{{ route('offers') }}">Postes disponibles
                                    <i class="material-icons"></i>
                                </a>
                                </div>

                                <div class="col-lg-7">
                                    <div class="banner_form_cont">
                                        <form action="{{ route('search') }}" method="GET">

                                            <div class="banerSearch" data-aos="fade-up" data-aos-delay="200">
                                                <div class="fild-wrap fw-job-title">
                                                    <i class="fas fa-briefcase"></i>
                                                    <select class="js-example-basic-multiple" name="secteur">
                                                        <option value="">--Secteur d'activité--</option>
                                                        @foreach ($secteurs as $secteur)
                                                            <option value="{{ $secteur->id }}"
                                                                {{ old('secteur') == $secteur->id ? 'selected' : '' }}>
                                                                {{ $secteur->title_secteur }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="fild-wrap fw-job-location">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    <select class="js-example-basic-single" name="ville">
                                                        <option value="">--ville--</option>
                                                        @foreach ($villes as $ville)
                                                            <option value="{{ $ville->id }}"
                                                                {{ old('ville') == $ville->id ? 'selected' : '' }}>
                                                                {{ $ville->title_ville }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="fild-wrap fw-submit">
                                                    <button type="submit" class="btn btn-primary" value="">
                                                        <i class="material-icons"></i> RECHERCHER
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="user_type">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="user_type_inner user_type_post">
                                                        <a href="#">
                                                            <div class="usertype_img">
                                                                <img alt=""
                                                                    src="{{ asset('assets/website/images/usertype-1.png') }}">
                                                                <img alt="" class="usertype-addon"
                                                                    src="{{ asset('assets/website/images/usertype-1-addon.png') }}">
                                                            </div>
                                                            <div>
                                                                <h3>Je recherche des professionnels</h3>
                                                                <p>Trouvez des professionnels qualifiés pour vos tâches
                                                                </p>
                                                                <i class="fas fa-long-arrow-alt-right"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header 02
================================================== -->
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
        </ul>

        <div class="section dark-section featured_section">
            <div class="bg-v">
                <div class="bg-v-3 bg-t-r">
                </div>
                <div class="bg-v-3 bg-b-l">
                </div>
            </div>
            <div class="container">
                <h2 data-aos="fade-up" data-aos-delay="400" class="section_h">Annonces d'emploi</h2>
                <div class="row two_col featured_box_outer">
                    @foreach ($offers as $offer)
                        <div class="col-sm-6">
                            <div class="featured_box ">
                                <div class='fb_content'>
                                    <h4>
                                        <a href="{{ route('offer.show.single',$offer->id) }}">{{ $offer->title_offer }}</a>
                                    </h4>
                                    <ul>
                                        @if ($offer->user->personne_type == 'entreprise')
                                            <li>
                                                <a href="#">
                                                    <i class="fas fa-landmark"></i>
                                                    Entreprise
                                                </a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="#">
                                                    <i class="far fa-user"></i>
                                                    Particulier
                                                </a>
                                            </li>
                                        @endif

                                        <li>
                                            <a href="#">
                                                <i class="fas fa-map-marker-alt"></i>
                                                {{ $offer->villes->title_ville }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="far fa-clock"></i>
                                                {{ $offer->created_at->format('d/m/Y') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="fb_action">
                                    <a class="btn btn-third"
                                        href="{{ route('prestataire.offer.apply', $offer->id) }}">Voir plus</a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                    <div class="col-md-12 text-right">
                        <a data-aos="fade-down" data-aos-delay="400" class="btn btn-primary"
                            href="{{ route('offers') }}">Tout voir <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="section category-section ">
            <div class="bg-v">
                <div class="bg-v-1 bg-t-l" data-aos="zoom-in">
                </div>
                <div class="bg-v-2 bg-b-r" data-aos="zoom-in">
                </div>
            </div>
            <div class="container">
                <h2 data-aos="fade-up" data-aos-delay="400" class="section_h">Nos secteurs d'activités</h2>
                <div class="row">
                    @foreach ($secteurs as $secteur)
                        <div class="col-lg-3 col-md-6">
                            <div class="category_box">
                                <div class="cb_header">
                                    <img alt="" src="{{ asset('assets/website/images/i-code.png') }}">
                                </div>
                                <div class="cb_bottom">
                                    <h3>{{ $secteur->title_secteur }}</h3>
                                    <p>{{ $secteur->description_secteur }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="section post_section">
            <div class="bg-v">
                <div class="bg-v-2 bg-t-l">
                </div>
                <div class="bg-v-2 bg-b-r">
                </div>
            </div>
            <div class="container">
                <h2 data-aos="fade-up" data-aos-delay="400" class="section_h">Nos derniers posts</h2>
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-4">
                            <div class="post_box">
                                <img alt="" src="{{ asset('attachments/' . $post->cover_image) }}"
                                    class="img-responsive">
                                <div class="post_content">
                                    <h6>
                                        <a href="">{{ $post->title_post }}</a>
                                    </h6>
                                    <p>{!! \Illuminate\Support\Str::limit($post->body_post, 100, '...') !!} </p>
                                    <a class="btn btn-secondary btn-rounded" href="{{ $post->getLink() }}">Continuer
                                        lecture</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="section gray  partner_section">
            <div class="bg-v">
                <div class="bg-v-1 bg-t-l">
                </div>
                <div class="bg-v-3 bg-b-r">
                </div>
            </div>
            <div class="container">
                <h2 data-aos="fade-up" data-aos-delay="400" class="section_h">Nos partenaires</h2>
                <ul class="partner_carousel owl-carousel owl-theme">
                    <li>
                        <a href="#"><img alt="brand logo"
                                src="{{ asset('assets/website/images/company-logo-1.svg') }}"></a>
                    </li>
                    <li>
                        <a href="#"><img alt="brand logo"
                                src="{{ asset('assets/website/images/company-logo-2.svg') }}"></a>
                    </li>
                    <li>
                        <a href="#"><img alt="brand logo"
                                src="{{ asset('assets/website/images/company-logo-3.svg') }}"></a>
                    </li>
                    <li>
                        <a href="#"><img alt="brand logo"
                                src="{{ asset('assets/website/images/company-logo-4.png') }}"></a>
                    </li>
                    <li>
                        <a href="#"><img alt="brand logo"
                                src="{{ asset('assets/website/images/company-logo-5.png') }}"></a>
                    </li>
                    <li>
                        <a href="#"><img alt="brand logo"
                                src="{{ asset('assets/website/images/company-logo-1.svg') }}"></a>
                    </li>
                    <li>
                        <a href="#"><img alt="brand logo"
                                src="{{ asset('assets/website/images/company-logo-2.svg') }}"></a>
                    </li>
                    <li>
                        <a href="#"><img alt="brand logo"
                                src="{{ asset('assets/website/images/company-logo-3.svg') }}"></a>
                    </li>
                    <li>
                        <a href="#"><img alt="brand logo"
                                src="{{ asset('assets/website/images/company-logo-4.png') }}"></a>
                    </li>
                    <li>
                        <a href="#"><img alt="brand logo"
                                src="{{ asset('assets/website/images/company-logo-5.png') }}"></a>
                    </li>
                </ul>
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
