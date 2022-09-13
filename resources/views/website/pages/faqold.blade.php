<!doctype html>
<html lang="en">

<head>

    <!-- Basic Page Needs
================================================== -->
    <title>FAQ | Centralresource</title>
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
                <h2>FAQs</h2>
            </div>
        </div>
    </header>

    <!-- Main
================================================== -->

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
    <main>
        <div class="simple_page">
            <div class="container ">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-md-12">
                            <h4>{{ $category->title_faq_cat }}</h4>
                            @foreach ($category->faqs as $faq)
                                <div id="accordion{{ $category->id }}">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link" data-toggle="collapse"
                                                href="#collapse{{ $faq->id }}">
                                                {!! $faq->question_faq !!}<i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                        <div id="collapse{{ $faq->id }}" class="collapse"
                                            data-parent="#accordion{{ $category->id }}">
                                            <div class="card-body">
                                                {!! $faq->answer_faq !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="section-divider">
                            <br>
                    @endforeach
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
