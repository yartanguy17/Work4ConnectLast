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
     @include('website.clients.partials.header')

    <div class="container-small">
        <div class="card">
            <div class="container-fluid d-flex align-items-center">
                <main class="col-lg-12">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">{{ __('welcome.form.expired') }}</h1>
                    </div>
                    <div class="job_container">
                        <div class="container">
                            <div class="row job_main">
                                <!---Side menu  -->

                                <!---/ Side menu -->
                                <div class=" job_main_right">
                                    <div class="row job_section">
                                        <div class="col-sm-12">
                                            <div class="jm_headings">
                                                <h6>{{ __('welcome.form.currents') }}</h6>
                                            </div>
                                            @include('website.inc.messages')
                                            <div class="table-cont">
                                                <table class="table table-striped table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">{{ __('welcome.form.datecont') }}
                                                            </th>
                                                            <th class="text-center">
                                                                {{ __('welcome.form.typeofcontract') }}</th>
                                                            <th class="text-center">
                                                                {{ __('welcome.form.jobseekername') }}</th>
                                                            <th class="text-center">{{ __('welcome.form.dateeff') }}
                                                            </th>
                                                            <th class="text-center">{{ __('welcome.form.datefin') }}
                                                            </th>
                                                            <th class="text-center">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($contrats as $contrat)
                                                            <tr>
                                                                <td class="text-center">
                                                                    <h6>{{ \Carbon\Carbon::parse($contrat->created_at)->format('d/m/Y') }}
                                                                    </h6>

                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $contrat->type->title_type_con }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $contrat->prestataire->last_name }}
                                                                    {{ $contrat->prestataire->first_name }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ Carbon\Carbon::parse($contrat->date_effet)->format('d/m/Y') }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $contrat->date_fin ? Carbon\Carbon::parse($contrat->date_fin)->format('d/m/Y') : 'N/A' }}
                                                                </td>
                                                                <td class="text-center">
                                                                    <div>
                                                                        <a
                                                                            href="{{ route('contrat.show', Crypt::encrypt($contrat->id)) }}">
                                                                            <i class="fa fa-eye text-primary"></i></a>
                                                                        <a
                                                                            href="{{ route('contratclient.pdf', $contrat->id) }}">
                                                                            <i class="fa fa-print text-success"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    @include('website.clients.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>
</body>

</html>
