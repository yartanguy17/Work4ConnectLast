<!doctype html>
<html lang="en">

<head>

    <!-- Basic Page Needs
================================================== -->
    <title>Détails d'une formation | Central ressource</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="{{ asset('assets/website/images/fav.png') }}" type="image/gif" sizes="64x64">

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
</head>

<body>
    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->
            <div class="header_btm">
                <h2>Détails d'une formation</h2>
            </div>
        </div>
    </header>
    <main>
        <div class="blog-listing">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="p-2">
                                    <h5 class="font-size-16"><strong>Type formation </strong></h5>
                                    <p>{{ $formation->types->title_type_for }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="p-2">
                                    <h5 class="font-size-16"><strong>Titre de la formation </strong></h5>
                                    <p>{{ $formation->title_formation }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="p-2">
                                    <h5 class="font-size-16"><strong>Description </strong></h5>
                                    <p>{!! $formation->description_formation !!}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="p-2">
                                    <h5 class="font-size-16"><strong>Coût </strong></h5>
                                    <p>{{ $formation->cout_formation }} F.CFA
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="p-2">
                                    <h5 class="font-size-16"><strong>Date de début </strong></h5>
                                    <p>{{ Carbon\Carbon::parse($formation->date_debut)->format('d/m/Y') }}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="p-2">
                                    <h5 class="font-size-16"><strong>Date de fin </strong></h5>
                                    <p>{{ Carbon\Carbon::parse($formation->date_fin)->format('d/m/Y') }} </p>
                                </div>
                            </div>

                            @if ($formation->document_formation != null)
                                <div class="col-md-12">
                                    <h5 class="font-size-16"><strong>Document </strong></h5>
                                    <p><i class="fas fa-file-download"></i> {{ $formation->document_formation }}</p>
                                    <div class="py-0 text-left">
                                        <a href="{{ asset('public/attachments/' . $formation->document_formation) }}"
                                            class="fw-medium" download>[Télécharger]</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-12 text-right">
                            <a data-aos="fade-down" data-aos-delay="400" class="btn btn-primary"
                                href="{{ URL::previous() }}">Retour <i class="fas fa-long-arrow-alt-left"></i></a>
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
