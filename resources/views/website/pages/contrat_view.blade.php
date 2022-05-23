<!doctype html>
<html lang="en">

<head>

    <!-- Basic Page Needs
================================================== -->
    <title>Détails d'un contrat | Work4connect</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="{{ asset('assets/front/images/resources/logo.png') }}" type="image/gif" sizes="64x64">

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
                <h2>Détails d'un contrat</h2>
            </div>
        </div>

        <style type="text/css">
            .float-end {
                float: right !important;
            }

        </style>
    </header>
    <!-- Main
================================================== -->
    <main>
        <div class="blog-listing">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="row">
                            <div class="col-12">
                                <div class="invoice-title">
                                    <h5 class="float-end font-size-16"><strong>Contrat #{{ $contrat->id }}</strong>
                                    </h5>
                                    <h5 class="mt-0">
                                        <img src="{{ asset('assets/front/images/resources/logo.png') }}"
                                            alt="Work4connect" height="24">
                                    </h5>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12 p-2">
                                        <div class="p-0">
                                            <h5 class="font-size-16"><strong>ENTRE LES SOUSSIGNES :</strong></h5>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <address>
                                            <strong>Le Prestataire :</strong><br>
                                            {{ $contrat->prestataire['last_name'] }}
                                            {{ $contrat->prestataire['first_name'] }}<br>
                                            {{ $contrat->prestataire['phone_number'] }} <br>
                                            {{ $contrat->prestataire['email'] }}<br>
                                            {{ $contrat->prestataire['address'] }}
                                        </address>
                                        <div class="p-0">
                                            <h5 class="font-size-16"><strong>D'UNE PART,</strong></h5>
                                        </div>
                                    </div>
                                    <div class="col-2 text-center">
                                        <div class="p-4">
                                            <h5 class="font-size-16"><strong>ET</strong></h5>
                                        </div>
                                    </div>
                                    <div class="col-5 text-end">
                                        <address>
                                            <strong>Le Client :</strong><br>
                                            {{ auth()->user()->last_name }}
                                            {{ auth()->user()->first_name }}<br>
                                            {{ auth()->user()->phone_number }} <br>
                                            {{ auth()->user()->email }}<br>
                                            {{ auth()->user()->address }}
                                        </address>
                                        <div class="p-0">
                                            <h5 class="font-size-16"><strong>D'AUTRE PART,</strong></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 p-2">
                                <div>
                                    <div class="p-2">
                                        <h3 class="font-size-16"><strong>IL A ETE ARRETE CE QUI SUIT:</strong></h3>
                                    </div>
                                    <div class="">
                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong>ARTICLE 1 : Objet </strong></h3>
                                            <p>Le prestataire {{ $contrat->prestataire['last_name'] }}
                                                {{ $contrat->prestataire['first_name'] }} est engagé par
                                                {{ auth()->user()->last_name }}
                                                {{ auth()->user()->first_name }} pour une mission
                                                {{ $contrat->motif_contrat }}
                                                d’applications web.
                                            </p>
                                        </div>

                                        @if ($contrat->date_fin != '')
                                            <div class="p-2">
                                                <h3 class="font-size-16"><strong>ARTICLE 2 : Durée </strong></h3>
                                                <p>Le présent contrat prend effet le
                                                    {{ \Carbon\Carbon::parse($contrat->date_effet)->format('d/m/Y') }}
                                                    et prendra fin de plein droit
                                                    et sans formalité le
                                                    {{ \Carbon\Carbon::parse($contrat->date_fin)->format('d/m/Y') }}
                                                </p>
                                            </div>

                                        @else

                                            <div class="p-2">
                                                <h3 class="font-size-16"><strong>ARTICLE 2 : Durée </strong></h3>
                                                <p>Le présent contrat prend effet le
                                                    {{ \Carbon\Carbon::parse($contrat->date_effet)->format('d/m/Y') }}
                                                    pour une durée indeterminée
                                                </p>
                                            </div>
                                        @endif


                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong>ARTICLE 3 : Lieu de travail</strong></h3>
                                            <p>
                                                Le lieu de travail est situé à {{ $contrat->exercice_place }}
                                            </p>
                                        </div>


                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong>ARTICLE 4 : Heures de travail </strong>
                                            </h3>
                                            <p>
                                                Les horaires seront les suivants:
                                            </p>
                                            <p>
                                                {!! $contrat->working_description !!}
                                            </p>
                                        </div>


                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong>ARTICLE 5 : Rénumération
                                                    mensuelle</strong>
                                            </h3>
                                            <p>
                                                En contrepartie de ses fonctions, le prestataire
                                                {{ $contrat->prestataire['last_name'] }}
                                                {{ $contrat->prestataire['first_name'] }} percevra un salaire mensuel
                                                de {{ $contrat->salary }} FCFA
                                                pour l’horaire moyen de (40) heures travaillés par semaine dans
                                                l’Entreprise.
                                            </p>
                                        </div>

                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong>ARTICLE 6 : Déclaration à la CNSS
                                                </strong>
                                            </h3>
                                            <p>
                                                L'entreprise sera déclaré immaediatement dès la signature des présentes.
                                            </p>
                                        </div>

                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong>ARTICLE 7 : Résiliation anticipée
                                                </strong>
                                            </h3>
                                            <p>
                                                Cet engagement est résilible de part et d'autre sous reserve de
                                                respecter, sauf cas de faute
                                                lourde, un préavis d'un mois conformément à la Convention collective en
                                                vigueur.
                                            </p>
                                        </div>

                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong>ARTICLE 8 : Obligations générales de
                                                    l'employé </strong></h3>
                                            <p>L'employé s'engage à veiller scrupuleusement aux intérêts de la Société
                                            </p>
                                            <p>En conséquence, sauf dérogation spéciale, il consacrera entièrement son
                                                activité professionnelle à l'éxécution
                                                du présent contrat.
                                            </p>
                                            <p>L'Employé s'engage à prendre connaissance, dès son entrée en activité,
                                                des notes de service en vigueur au sein de l'entreprise hôte,
                                                notamment XXXXX et à accepter les règlements traitant des différentes
                                                relations au sein du personnel et entre les services, notamment le
                                                reglement intérieur de ladite entreprise.
                                            </p>
                                            <p>En cas d'absence au travail, l'Employé s'engage à avertir le plus
                                                rapidement possible le service du personnel.
                                                Après une absence pour maladie d'une durée supérieure à 24 heures, elle
                                                devra faire parvenir un certificat médical dans un délai maximum de six
                                                (06) jours à compter du premier jour
                                                d'indisponiblité. Cependant elle devra préalablement informer
                                                l'Employeur de la maladie ou de l'accident dans un delai de soixante
                                                douze (72) heures. </p>
                                            <p>
                                                En outre, l'Employé devra se rendre, s'il y est invité, chez le médecin
                                                désigné par l'entreprise ou recevoir éventuellemnt le médecin à domicile
                                                afin de permettre le contrôle de la réalité
                                                de son incapacité au travail.
                                            </p>
                                        </div>

                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong>ARTICLE 9 : Secret professionnel
                                                </strong>
                                            </h3>
                                            <p>L'Employé s'abstiendra de divulger les renseignements techniques ou
                                                commerciaux, ainsi que le secret de toute affaire à caractère personnel
                                                ou confidentiel dont il aurait eu connaissance dans l'exercice
                                                de son activité professionnelle au sein de l'entreprise hôte. Cette
                                                discretion s'étend aussi bien sur la période où l'Employé est lié par le
                                                contrat de travail, qu'après la rupture de ce contrat.
                                            </p>

                                            <p>Il s'abstiendra évidemment de se livrer ou de coopérer de façon directe
                                                ou indirecte à tout acte de concurrence déloyale.</p>

                                            <p>Les parties s'engagent au surplus à se conformer aux dispositions
                                                réglementaires impératives en la matière.</p>

                                        </div>

                                        <div class="row">
                                            <div class="col-12 mt-2">
                                                <div class="p-2">
                                                    <p>Fait en deux (02) exemplaires à LOME (Togo), le </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 mt-4">
                                                <div class="p-2">
                                                    <h3 class="font-size-16"><strong>L'Employé*</strong></h3>
                                                </div>

                                                <div class="p-4">
                                                    <p></p>
                                                </div>
                                            </div>

                                            <div class="col-6 mt-4 text-end">
                                                <div class="p-2">
                                                    <h3 class="font-size-16"><strong>Pour Work4connect</strong>
                                                    </h3>
                                                </div>

                                                <div class="p-4">
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 mt-4 text-center">
                                                <div class="p-4">
                                                    <p style="font-style: italic;">(*) Signature de l'Employé précédée
                                                        de la mention manuscrite « Lu et approuvé »</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-print-none">
                                            <div class="float-end">
                                                <a href="{{ route('contratclient.pdf', $contrat->id) }}"
                                                    class="btn btn-success waves-effect waves-light"><i
                                                        class="fa fa-print"></i></a>
                                                <a class="btn btn-primary" href="{{ URL::previous() }}"><i
                                                        class="fas fa-long-arrow-alt-left"></i> Retour</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- end row -->
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
