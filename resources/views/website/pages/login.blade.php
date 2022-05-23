@include('website.partials.header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<body>

    <div class="page-wrapper">

        @include('website.partials.menu')

        <div class="container card">
            <div class="header_btm">
                <h2>Connexion</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="only-form-box">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="com_class_form">
                                @include('website.inc.messages')
                                <div class="form-group">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                        size="40" placeholder="Adresse e-mail * ">
                                </div>

                                <div class="form-group">
                                    <input class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" type="password" id="myInput"
                                        placeholder=" Mot de passe * ">
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
                                    <input class="btn btn-primary" type="submit" value="Se connecter">
                                </div>

                                <div class="form-group form-check">
                                    <label class="form-check-label" for="remember">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}> Se souvenir
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
    @include('website.partials.footer')
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
