<!doctype html>
<html lang="fr">

<head>

    <!-- Basic Page Needs
================================================== -->
    <title>Login |NEARSHORING</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="" type="image/gif" sizes="64x64">

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
    <style>
        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -25px;
            position: relative;
            z-index: 2;
        }

        .container {
            padding-top: 50px;
            margin: auto;
        }

    </style>
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
                <h2>Connexion</h2>
            </div>
        </div>
    </header>
    <!-- Main
================================================== -->
    <main>
        <div class="only-form-pages">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="only-form-box">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="com_class_form">
                                    @include('website.inc.messages')
                                    <div class="form-group">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            autofocus size="40" placeholder="Adresse e-mail * ">
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password" type="password"
                                            id="myInput" placeholder=" Mot de passe * ">
                                    </div>
                                    <!-- An element to toggle between password visibility -->
                                    <div class="form-group form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" onclick="myFunction()">
                                            Afficher mot
                                            de passe
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <input class="btn" type="submit" value="Se Connecter" style="background-color: #2c724f;color:#FFFFFF;font-family: 'Font Awesome 5 Free';font-weight: bold;">
                                    </div>

                                    <div class="form-group form-check">
                                        <label class="form-check-label" for="remember">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}> Se souvenir
                                        </label>
                                    </div>

                                    @if (Route::has('password.request'))
                                        <div>
                                            <a class="lost_password" href="{{ route('password.request') }}"> Mot de
                                                passe oublié?</a>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer Container
================================================== -->

    {{-- @include('website.partials.footer') --}}

    <!-- End Footer Container
================================================== -->

    <!-- Scripts
================================================== -->
    {{-- <script src="{{ asset('assets/website/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/aos.js') }}"></script>
    <script src="{{ asset('assets/website/js/custom.js') }}"></script> --}}
    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>
