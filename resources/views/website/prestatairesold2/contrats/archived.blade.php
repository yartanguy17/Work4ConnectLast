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
        header {
            height: 10%;
        }

    </style>
    @include('website.prestataires.partials.header')

    <div class="container-fluid">
        <div class="row">
            @include('website.prestataires.partials.nav_bar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"> {{ __('welcome.form.expired') }}</h1>
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
                                            <h6>{{ __('welcome.form.textarchive') }}</h6>
                                        </div>
                                        @include('website.inc.messages')
                                        <div class="table-cont">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('welcome.form.datecont') }}</th>
                                                        <th>{{ __('welcome.form.typeofcontract') }}</th>
                                                        <th>{{ __('welcome.form.customername') }}</th>
                                                        <th>{{ __('welcome.form.dateeff') }}</th>
                                                        <th>{{ __('welcome.form.datefin') }}</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($contrats as $contrat)
                                                        <tr>
                                                            <td>
                                                                <h6>{{ Carbon\Carbon::parse($contrat->created_at)->format('d/m/Y') }}
                                                                </h6>
                                                                <ul class="job-dashboard-actions">

                                                                    {{-- <li>
                                                            <a href="{{ route('contrat.pdf', $contrat->id) }}"
                                                                class="job-dashboard-action-mark_filled">
                                                                Imprimer</a>
                                                        </li> --}}
                                                                </ul>
                                                            </td>

                                                            <td>
                                                                {{ $contrat->type->title_type_con }}
                                                            </td>

                                                            <td>
                                                                {{ $contrat->client->last_name }}
                                                                {{ $contrat->client->first_name }}
                                                            </td>

                                                            <td>
                                                                {{ \Carbon\Carbon::parse($contrat->date_effet)->format('d/m/Y') }}
                                                            </td>

                                                            <td>
                                                                {{ \Carbon\Carbon::parse($contrat->date_fin)->format('d/m/Y') }}
                                                            </td>
                                                            <td>
                                                                <li>
                                                                    <a href="{{ route('contrat.show', Crypt::encrypt($contrat->id)) }}"
                                                                        class="job-dashboard-action-mark_filled">
                                                                        {{ __('welcome.form.show') }}</a>
                                                                </li>
                                                                <style>
                                                                    a {
                                                                        color: red;
                                                                    }

                                                                </style>
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

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>
</body>

</html>
