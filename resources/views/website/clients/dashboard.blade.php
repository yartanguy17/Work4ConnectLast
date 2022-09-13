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
        padding-left: 10%;
        padding-right: 10%;
        margin-bottom: 50px;
    }
    .mleft{
        margin-right: 35px;
    }
    .lie {
        color: white;
    }
    a{
        text-decoration: none;
        color: red;
    }
</style>
@include('website.clients.partials.header')
<div class="container-small">
    <div class="row ">
        @include("website.partials.routes")
        <div class="card col-lg-8">
            <div class="container-fluid d-flex align-items-center">

                <main class="col-lg-12">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">{{ __('welcome.menu.dashboard') }}</h1>
                    </div>
                    <div class="row clearfix row-deck" style="margin-bottom: 25px;">
                        <div class="col-12">
                            <a class="card" href="{{ route('client.offers.index') }}">
                                <div class="card-header bg-danger op">
                                    <h5 class="card-title d-flex justify-content-center text-light">{{ __('welcome.form.myadd') }}</h5>
                                </div>
                                <div class="card-body d-flex justify-content-center">
                                    <h5 class="number mb-0 font-32 counter">{{ $offers }}</h5>

                                </div>
                            </a>
                        </div>
                        
                        <style>


                        </style>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </div>

</div>

@include('website.partials.footer')

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="dashboard.js"></script>
</body>
</html>
