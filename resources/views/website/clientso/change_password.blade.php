
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
                        <h1 class="h2">{{ __('welcome.footer.password') }}</h1>
                    </div>
                        <div class="row job_main">
                            <!---Side menu  -->

                            <!---/ Side menu -->
                            <div class=" job_main_right">
                                <div class="row job_section">
                                    <div class="col-sm-12">
                                        <div class="jm_headings">
                                            <h5>{{ __('welcome.footer.password') }}</h5>
                                        </div>
                                        <div class="section-divider"></div>
                                        @include('website.inc.messages')
                                        <form action="{{ route('client.update_password') }}" method="POST">
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label for="current-password"> {{ __('welcome.form.actupassw') }}
                                                        <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control" placeholder=""
                                                        id="current-password" name="old_password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label for="new-password">{{ __('welcome.form.newpassw') }} <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control" placeholder=""
                                                        id="new-password" name="new_password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label
                                                        for="confirm-new-password">{{ __('welcome.form.passconf') }}
                                                        <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control" placeholder=""
                                                        name="confirm_password" id="confirm-new-password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-9 offset-md-3">
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ __('welcome.form.add') }}</button>
                                                </div>
                                            </div>
                                        </form>
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
