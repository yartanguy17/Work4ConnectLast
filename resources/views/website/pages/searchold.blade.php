<!doctype html>
<html lang="en">

<head>

    <!-- Basic Page Needs
================================================== -->
    <title>Recherche | Centralresource</title>
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
                <h2>Recherche</h2>
            </div>
        </div>
    </header>
    <main>
        <div class="section  featured_section">
            <div class="container">

                @if ($prestataires->isNotEmpty())

                    <h2 class="section_h">{{ $prestataires->count() }} Profil(s) trouvé(s)</h2>
                @else
                    <h2 class="section_h">Pas de Profil trouvé</h2>
                @endif
                <div class="row full_width featured_box_outer">
                    @if ($prestataires->isNotEmpty())

                        @foreach ($prestataires as $prestataire)

                            <div class="col-sm-12">
                                <div class="featured_box ">
                                    <div class="fb_content">
                                        <ul>
                                            @if ($prestataire->personne_type == 'entreprise')
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
                                                    <i class="fas fa-city"></i>
                                                    {{ $prestataire->villes->title_ville }}
                                                </a>
                                            </li>

                                            @if ($prestataire->personne_type == 'particulier')
                                                <li>
                                                    <i class="fas fa-border-all"></i>
                                                    <h6>Sexe</h6>
                                                    @if ($prestataire->gender == 'M')
                                                        <p>Masculin</p>
                                                    @else
                                                        <p>Féminin</p>
                                                    @endif
                                                </li>

                                                <li>
                                                    <i class="far fa-user"></i>
                                                    <h6>Age</h6>
                                                    <input type="hidden"
                                                        value="{{ $prestataire->birth_date ? $prestataire->birth_date : 'N/A' }}"
                                                        id="birth_date">
                                                    <p id="age"></p>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    <ul class="tags">
                                        <li>{{ $prestataire->secteurs->title_secteur }}</li>
                                    </ul>
                                    <div class="fb_action">
                                        <a title="Voir" href="{{ route('prestataire.view', $prestataire->id) }}"><i
                                                class="far fa-eye"></i></a>
                                        <a class="btn btn-third" href="#" type="button" data-toggle="modal"
                                            data-target="#confirm_resource"
                                            onclick="addData({{ $prestataire->id }})">Réserver cette ressource</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {!! $prestataires->links() !!}
                    @else
                        <div class="col-sm-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span>
                                    <b> Pas profil trouvé correspondant à votre recherche </b>
                                </span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="confirm_resource" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form action="" id="addForm" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Confirmation de reservation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            {{ method_field('POST') }}
                            <p>Souhaitez-vous que Centralresource vous réserve ce prestataire ?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Oui</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>

                        </div>
                    </div>
                </form>
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
    <script>
        var ptag = $('#birth_date').val();
        if (ptag != '') {
            var birthdate = new Date(ptag);
            var cur = new Date();
            // var diff = cur - birthdate;
            // var age = Math.floor(diff / 31536000000);
            var month_diff = Date.now() - birthdate.getTime();
            var month_diff_v = Date.now() - cur.getTime();


            var age_dt = new Date(month_diff);
            var age_dt_v = new Date(month_diff_v);


            var year = age_dt.getUTCFullYear();
            var year_v = age_dt_v.getUTCFullYear();


            var age = Math.abs(year_v - year);
            $('#age').text(age);

        }

        function addData(id) {
            var id = id;
            var url = '{{ route('client.reservations', ':id') }}';
            url = url.replace(':id', id);
            $("#addForm").attr('action', url);
        }

        function formSubmit() {
            $("#addForm").submit();
        }
    </script>
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
