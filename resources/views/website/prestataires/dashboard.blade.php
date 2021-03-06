<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Work4connect</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    @include('website.partials.header')

    <!-- Bootstrap core CSS -->

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>


    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>

<body class="bg-light">
    <style>
        .container-small{
            padding-left: 20%;
            padding-right: 20%;
            margin-bottom: 50px;
        }

    </style>
   @include('website.partials.header')
    <div class="container-small">
        <div class="card">
            <div class="container-fluid d-flex align-items-center">
                <main class="col-lg-12">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2"> {{ __('welcome.menu.dashboard') }}</h1>
                    </div>
                    <div class="row clearfix row-deck" style="margin-bottom: 25px;">
                        <div class="col-4">
                            <a class="card" href="{{ route('client.offers.index') }}">
                                <div class="card-header bg-primary op">
                                    <h5 class="card-title d-flex justify-content-center text-light">
                                        {{ __('welcome.form.current') }}</h5>
                                </div>
                                <div class="card-body d-flex justify-content-center">
                                    <h5 class="number mb-0 font-32 counter">{{ $nbreContratEnCours }}</h5>

                                </div>
                            </a>
                        </div>
                        <div class="col-4">
                            <a class="card" href="{{ route('client.contrat.pending') }}">
                                <div class="card-header bg-success op">
                                    <h5 class="card-title d-flex justify-content-center text-light">
                                        {{ __('welcome.form.expired') }}</h5>
                                </div>
                                <div class="card-body d-flex justify-content-center">
                                    <h5 class="number mb-0 font-32 counter">{{ $nbreContratExpire }}</h5>

                                </div>
                            </a>
                        </div>
                        <style>
                            a {
                                text-decoration: none;
                            }

                        </style>
                        <div class="col-4">
                            <a class="card" href="{{ route('client.contrat.archived') }}">
                                <div class="card-header bg-warning op">
                                    <style>
                                        .op {
                                            opacity: 0.6;
                                        }

                                    </style>
                                    <h5 class="card-title text-center text-light"> {{ __('welcome.form.myapp') }}</h5>
                                </div>
                                <div class="card-body d-flex justify-content-center">
                                    <h5 class="number mb-0 font-32 counter">{{ $nbreCandidatures}}</h5>

                                </div>
                            </a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>


                    </div>
                </main>
            </div>
        </div>
    </div>
    @include('website.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>
</body>

</html>
