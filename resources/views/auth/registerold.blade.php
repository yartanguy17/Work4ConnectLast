<!doctype html>
<html lang="en">

<head>
    <!-- Basic Page Needs
================================================== -->
    <title>Inscription client | Centralresource</title>
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
    <link rel="stylesheet" href="{{ asset('css/intlTelInput.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/btn.css') }}">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css"
        rel="stylesheet">
    {!! NoCaptcha::renderJs() !!}
    <style>
        .iti {
            width: 100%;
        }

        .iti__flag {
            background-image: url("{{ asset('images/flags.png') }}");
        }

        @media (-webkit-min-device-pixel-ratio: 2),
        (min-resolution: 192dpi) {
            .iti__flag {
                background-image: url("{{ asset('images/flags@2x.png') }}");
            }
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
                <h2>Inscription d'un client</h2>
            </div>
        </div>
    </header>
    <main>
        <div class="only-form-pages">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="only-form-box-2">
                            @include('website.inc.messages')
                            <div class="welcome-text text-center mb-5">
                                <h5 class="mb-0">Créer un compte!</h5>
                                <span>J'ai déjà un compte? <a href="{{ route('login') }}">Se connecter!</a></span>
                            </div>
                            <form method="POST" action="{{ route('register_client_save') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group user_type_cont">
                                    <label class="user_type" for="usertype-1">
                                        <input type="radio" checked name="personne_type" id="usertype-1"
                                            value="particulier"
                                            {{ old('personne_type') == 'particulier' ? 'checked' : '' }}>
                                        <span><i class="far fa-user"></i> Particulier</span>
                                    </label>
                                    <label class="user_type" for="usertype-2">
                                        <input type="radio" name="personne_type" id="usertype-2" value="entreprise"
                                            {{ old('personne_type') == 'entreprise' ? 'checked' : '' }}>
                                        <span><i class="fas fa-landmark"></i> Entreprise</span>
                                    </label>
                                </div>
                                <div class="row form-row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Nom<span class="text-danger">*</span></label>
                                            <input class="form-control " name="last_name" id="last_name"
                                                value="{{ old('last_name') }}" autofocus type="text" size="40"
                                                placeholder="Nom *">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6" id="contact_name_section" style="display: none;">
                                        <div class="form-group">
                                            <label>Nom du Responsable </label>
                                            <input class="form-control" name="contact_name" id="contact_name"
                                                value="{{ old('contact_name') }}" type="text" size="40"
                                                placeholder="Nom du Responsable *">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6" id="nif_section" style="display: none;">
                                        <div class="form-group">
                                            <label>RC </label>
                                            <input class="form-control" id="rc" name="nif"
                                                value="{{ old('nif') }}" type="number" size="40" placeholder="RC">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6" id="firstname_section">
                                        <div class="form-group">
                                            <label>Prénom(s) <span class="text-danger">*</span></label>
                                            <input class="form-control" name="first_name" id="first_name"
                                                value="{{ old('first_name') }}" type="text" size="40"
                                                placeholder="Prénom(s) ">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Adresse e-mail <span class="text-danger">*</span></label>
                                            <input class="form-control" type="email" id="email" name="email"
                                                value="{{ old('email') }}" size="40" placeholder="Adresse e-mail">
                                            <p id="result" style="font-style: italic; font-size: 12px"></p>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Téléphone <span class="text-danger">*</span></label>
                                            <input id="output" type="hidden" name="phone_number"
                                                value="{{ old('phone_number') }}" />
                                            <input type="tel" id="phone" name="" class="form-control"
                                                value="{{ old('phone_number') }}" size="40">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Confirmation Téléphone <span class="text-danger">*</span></label>
                                            <input id="confirm_output" type="hidden" name="confirm_phone_number"
                                                value="{{ old('confirm_phone_number') }}" />
                                            <input type="tel" id="confirm_phone" name="" class="form-control"
                                                value="{{ old('confirm_phone_number') }}">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Ville <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control select" name="ville_id">
                                                <option value="">--Selectionner ville--</option>
                                                @foreach ($villes as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('ville_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->title_ville }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6" id="gender_section">
                                        <div class="form-group">
                                            <label>Civilité <span class="text-danger">*</span></label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="inlineRadio1" value="M" checked
                                                    {{ old('gender') == 'M' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio1">Mr</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="inlineRadio2" value="F"
                                                    {{ old('gender') == 'F' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio2">Mme</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="inlineRadio3" value="L"
                                                    {{ old('gender') == 'L' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio3">Mlle</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6" id="date_creation_section" style="display: none;">
                                        <div class="form-group">
                                            <label>Date de création </label>
                                            <input class="form-control" id="date_creation" name="date_creation"
                                                value="{{ old('date_creation') }}" type="date" size="40"
                                                placeholder="Date de création *">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Mot de passe <span class="text-danger">*</span></label>
                                            <input class="form-control" name="password" type="password" id="password"
                                                placeholder="Mot de passe *">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Confirmer mot de passe <span class="text-danger">*</span></label>
                                            <input class="form-control" type="password" name="password_confirmation"
                                                id="confirm" placeholder="Confirmer mot de passe *">
                                            <br>
                                            <p id="message" style="font-style: italic; font-size: 12px"></p>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="terms" id="terms"
                                                    OnClick="checkbox();"> J'accepte les <a
                                                    href="{{ route('terms') }}" target="_blank">conditions générales
                                                    d'utilisation</a> de
                                                Centralresource
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group form-check">
                                            {!! app('captcha')->display() !!}
                                            @if ($errors->has('g-recaptcha-response'))
                                                <span class="help-block text-danger">
                                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" id="submit" value="S'inscrire"
                                        disabled="disabled" />
                                </div>
                            </form>
                        </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        function validateEmail(email) {
            const re =
                /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }

        function validate() {
            const $result = $("#result");
            const email = $("#email").val();
            $result.text("");

            if (validateEmail(email)) {
                $result.text(email + " est valable");
                $result.css("color", "green");
            } else {
                $result.text(email + " n'est pas valide");
                $result.css("color", "red");
            }
            return false;
        }

        $("#email").on("input", validate);
    </script>
    <script src="{{ asset('assets/website/js/jquery-3.4.1.min.js') }}"></script>
    <script>
        function checkbox() {
            if (document.getElementById('terms').checked) {
                document.getElementById('submit').disabled = '';
            } else {
                document.getElementById('submit').disabled = 'disabled';
            }
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
    <script type="text/javascript" src="{{ asset('js/intlTelInput.js') }}"></script>
    <script>
        var input = document.querySelector("#phone");
        output = document.querySelector("#output");
        var iti = window.intlTelInput(input, {
            initialCountry: "auto",
            geoIpLookup: function(success, failure) {
                $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "tg";
                    success(countryCode);
                });
            },
            onlyCountries: ['tg'],
            separateDialCode: true,
            utilsScript: "{{ asset('js/utils.js') }}" // just for formatting/placeholders etc
        });

        var handleChange = function() {
            var text = iti.getNumber();
            //var text = iti.getNumber(intlTelInputUtils.numberFormat.E164);

            var textNode = document.createTextNode(text);
            output.innerHTML = "";
            output.appendChild(textNode);
            document.getElementById("output").value = text;
        };

        // listen to "keyup", but also "change" to update when the user selects a country
        input.addEventListener('change', handleChange);
        input.addEventListener('keyup', handleChange);


        //Phone number Confirmation
        var confirm_input = document.querySelector("#confirm_phone");
        confirm_output = document.querySelector("#confirm_output");
        var confirm_iti = window.intlTelInput(confirm_input, {
            initialCountry: "auto",
            geoIpLookup: function(success, failure) {
                $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "tg";
                    success(countryCode);
                });
            },
            onlyCountries: ['tg'],
            separateDialCode: true,
            utilsScript: "{{ asset('js/utils.js') }}" // just for formatting/placeholders etc
        });

        var handleChange = function() {
            var confirm_text = confirm_iti.getNumber();
            //var text = iti.getNumber(intlTelInputUtils.numberFormat.E164);

            var confirm_textNode = document.createTextNode(confirm_text);
            confirm_output.innerHTML = "";
            confirm_output.appendChild(confirm_textNode);
            document.getElementById("confirm_output").value = confirm_text;
        };

        // listen to "keyup", but also "change" to update when the user selects a country
        confirm_input.addEventListener('change', handleChange);
        confirm_input.addEventListener('keyup', handleChange);
    </script>

    <script>
        $('input:radio[name="personne_type"]').change(function() {
            if ($(this).val() == "particulier") {

                //console.log('Particulier')
                $("#date_creation_section").hide();
                //$("#date_creation").prop('required', false);

                $("#contact_name_section").hide();
                //$("#contact_name").prop('required', false);

                $("#nif_section").hide();
                $("#nif").prop('required', false);

                $("#birth_date_section").show();
                //$("#birth_date").attr("required", true);

                $("#firstname_section").show();
                $("#firstname").attr("required", true);

                $("#gender_section").show();
                //$("#gender").attr("required", true);

            } else {

                //console.log('Entreprise')
                $("#date_creation_section").show();
                //$("#date_creation").prop('required', true);

                $("#contact_name_section").show();
                //$("#contact_name").prop('required', true);

                $("#nif_section").show();
                $("#nif").prop('required', true);

                $("#birth_date_section").hide();
                //$("#birth_date").prop('required', false);

                $("#firstname_section").hide();
                $("#first_name").prop('required', false);

                $("#gender_section").hide();
                $('input:radio[name="gender"]').prop('checked', false);
                // $("#gender").removeAttr("required", true);​​​​​
            }
        });

        $('#last_name').keyup(function() {
            $(this).val($(this).val().toUpperCase());
        });

        $('#rc').keyup(function() {
            $(this).val($(this).val().toUpperCase());
        });

        $('#contact_name').keyup(function() {
            $(this).val($(this).val().toUpperCase());
        });

        $('#first_name').keyup(function() {

            var str = $('#first_name').val();
            var spart = str.split(" ");
            for (var i = 0; i < spart.length; i++) {
                var j = spart[i].charAt(0).toUpperCase();
                spart[i] = j + spart[i].substr(1);
            }

            $('#first_name').val(spart.join(" "));

        });

        $('#phone').on('keyup', function() {
            limitText(this, 8)
        });

        $('#confirm_phone').on('keyup', function() {
            limitText(this, 8)
        });

        function limitText(field, maxChar) {
            var ref = $(field),
                val = ref.val();
            if (val.length >= maxChar) {
                ref.val(function() {
                    console.log(val.substr(0, maxChar))
                    return val.substr(0, maxChar);
                });
            }
        }

        $('#phone').keypress(function(e) {
            var charCode = (e.which) ? e.which : event.keyCode
            if (String.fromCharCode(charCode).match(/[^0-9]/g))
                return false;
        });

        $('#confirm_phone').keypress(function(e) {
            var charCode = (e.which) ? e.which : event.keyCode
            if (String.fromCharCode(charCode).match(/[^0-9]/g))
                return false;
        });

        $('#confirm').keyup(function() {
            var password = $('#password')
            var confirm = $(this)
            var message = $('#message')
            var submit = $('.btn-primary')
            if (confirm.val() !== password.val()) {
                console.log(confirm.val() + ' === ' + password.val())
                message.html('La confirmation ne correspond pas au mot de passe').css("color", "red")
            } else {
                message.html('Confirmation correcte').css("color", "green")
            }
        })

        /*$(function() {
            $('#birth_date').datepicker({
                format: "dd/mm/yyyy",
                weekStart: 0,
                calendarWeeks: true,
                autoclose: true,
                todayHighlight: true,
                orientation: "auto"
            });
        });*/
    </script>
    <script src="{{ asset('assets/website/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/aos.js') }}"></script>
    <script src="{{ asset('assets/website/js/custom.js') }}"></script>
    <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
</body>

</html>
