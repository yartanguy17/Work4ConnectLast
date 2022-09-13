<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('assets/website/scss/app.scss') }}">

    <title>Work4connect</title>

    <!-- Bootstrap Core and vandor -->
    <link rel="stylesheet"
        href="{{ asset('assets/front/dasboard-client-prestataire/assets/plugins/bootstrap/css/bootstrap.min.css') }}" />

    <!-- Plugins css -->
    <link rel="stylesheet"
        href="{{ asset('assets/front/dasboard-client-prestataire/assets/plugins/charts-c3/c3.min.css') }}" />

    <!-- Core css -->
    <link rel="stylesheet" href="{{ asset('assets/front/dasboard-client-prestataire/assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/front/dasboard-client-prestataire/assets/css/theme1.css') }}" />
</head>

<body class="font-montserrat">

    <div class="page-loader-wrapper">
        <div class="loader">
        </div>
    </div>

    @yield('content')

    <!-- Footer Container
================================================== -->



    <!-- End Footer Container
================================================== -->

    <!-- Scripts
================================================== -->
    <script src="{{ asset('assets/front/dasboard-client-prestataire/assets/bundles/lib.vendor.bundle.js') }}"></script>

    <script src="{{ asset('assets/front/dasboard-client-prestataire/assets/bundles/apexcharts.bundle.js') }}"></script>
    <script src="{{ asset('assets/front/dasboard-client-prestataire/assets/bundles/counterup.bundle.js') }}"></script>
    <script src="{{ asset('assets/front/dasboard-client-prestataire/assets/bundles/knobjs.bundle.js') }}"></script>
    <script src="{{ asset('assets/front/dasboard-client-prestataire/assets/bundles/c3.bundle.js') }}"></script>

    <script src="{{ asset('assets/front/dasboard-client-prestataire/assets/js/core.js') }}"></script>
    <script src="{{ asset('assets/front/dasboard-client-prestataire/assets/js/page/project-index.js') }}"></script>

</body>

</html>
