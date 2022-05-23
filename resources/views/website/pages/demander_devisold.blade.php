<!doctype html>
<html lang="en">

<head>

    <!-- Basic Page Needs
================================================== -->
    <title>Demande de devis | Centralresource</title>
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
                <h2>Demande de devis</h2>
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
                            <form method="POST" action="{{ route('post_demander_devis') }}">
                                @csrf

                                <div class="welcome-text text-center mb-5">
                                    <h5 class="mb-0">Vos coordonnées</h5>
                                </div>
                                <div class="row form-row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Secteur d'activité</label>
                                            <select class="form-control select" name="secteur_activite_id" required>
                                                <option value="">--Selectionner secteur d'activité--</option>
                                                @foreach ($secteurs as $secteur)
                                                    <option value="{{ $secteur->id }}"
                                                        {{ old('secteur_activite_id') == $secteur->id ? 'selected' : '' }}>
                                                        {{ $secteur->title_secteur }}
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
                                                    id="inlineRadio1" value="M" checked>
                                                <label class="form-check-label" for="inlineRadio1">Mr</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="inlineRadio2" value="F">
                                                <label class="form-check-label" for="inlineRadio2">Mme</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="inlineRadio2" value="L">
                                                <label class="form-check-label" for="inlineRadio2">Mlle</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Nom <span class="text-danger">*</span></label>
                                            <input class="form-control" name="last_name" id="last_name" value=""
                                                required autofocus type="text" size="40" placeholder="Nom *">

                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6" id="firstname_section">
                                        <div class="form-group">
                                            <label>Prénom(s)</label>
                                            <input class="form-control" name="first_name" id="first_name" value=""
                                                type="text" size="40" placeholder="Prénom(s) ">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Adresse e-mail <span class="text-danger">*</span></label>
                                            <input class="form-control" id="email" name="email" value="" size="40"
                                                placeholder="Email *">
                                        </div>
                                    </div>
                                </div>

                                <div class="welcome-text text-center mb-5">
                                    <h5 class="mb-0">Nous vous rappellerons</h5>
                                </div>

                                <div class="form-group user_type_cont">
                                    <label class="user_type" for="usertype-1">
                                        <input type="radio" checked name="type_id" id="usertype-1" value="1">
                                        <span><i class="far fa-check"></i> Immédiatement</span>
                                    </label>
                                    <label class="user_type" for="usertype-2">
                                        <input type="radio" name="type_id" id="usertype-2" value="2">
                                        <span><i class="fas fa-clock"></i> Sur le créneau de votre choix</span>
                                    </label>
                                </div>

                                <div class="row form-row">

                                    <div class="col-12 col-sm-6" id="date_section" style="display: none;">
                                        <div class="form-group">
                                            <label>Date <span class="text-danger">*</span></label>
                                            <input class="form-control" name="date" id="date"
                                                onchange="setCorrect(this,'date');" value="" type="date" size="40">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6" id="plage_horaire_section" style="display: none;">
                                        <div class="form-group">
                                            <label>Plage horaire<span class="text-danger">*</span></label>
                                            <select class="form-control select" name="range" id="plage_horaire">
                                                <option value="">--Sélectionner plage horaire--</option>
                                                <option value="8h-9h">8h-9h</option>
                                                <option value="9h-10h">9h-10h</option>
                                                <option value="10h-11h">10h-11h</option>
                                                <option value="11h-12h">11h-12h</option>
                                                <option value="12h-13h">12h-13h</option>
                                                <option value="13h-14h">13h-14h</option>
                                                <option value="14h-15h">14h-15h</option>
                                                <option value="15h-16h">15h-16h</option>
                                                <option value="16h-17h">16h-17h</option>
                                                <option value="17h-18h">17h-18h</option>
                                                <option value="18h-19h">18h-19h</option>
                                                <option value="19h-20h">19h-20h</option>
                                                <option value="20h-21h">20h-21h</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Téléphone <span class="text-danger">*</span></label>
                                            <input id="output" type="hidden" name="phone_number" value="" />
                                            <input type="tel" id="phone" name="" class="form-control" value=""
                                                required size="40">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Adresse/Quartier/Localisation <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="address" id="address" class="form-control"
                                                value="" required size="40" placeholder="Adresse/Quartier/Localisation">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        {!! app('captcha')->display() !!}
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Valider">
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
    <script language="javascript">
        //function to convert enterd date to any format
        function setCorrect(xObj, xTarget) {
            var today = new Date();
            var date = new Date(xObj.value);
            var month = date.getMonth() + 1;
            var day = date.getDate();
            var year = date.getFullYear();
            var monthd = today.getMonth() + 1;
            var dayd = today.getDate();
            var yeard = today.getFullYear();
            console.log(day + ' ' + month + ' ' + year + '\n');
            console.log(dayd + ' ' + monthd + ' ' + yeard);

            if (year < yeard) {
                console.log("modif1");
                if (dayd < 10) {
                    document.getElementById(xTarget).value = yeard + "-" + monthd + "-0" + dayd;
                } else {
                    document.getElementById(xTarget).value = yeard + "-" + monthd + "-" + dayd;
                }
            } else if (year = yeard) {
                if (month < monthd) {
                    console.log("modif2");
                    if (dayd < 10) {
                        document.getElementById(xTarget).value = yeard + "-" + monthd + "-0" + dayd;
                    } else {
                        document.getElementById(xTarget).value = yeard + "-" + monthd + "-" + dayd;
                    }
                } else if (month == monthd) {
                    if (day < dayd) {
                        console.log("modif3");
                        if (dayd < 10) {
                            document.getElementById(xTarget).value = yeard + "-" + monthd + "-0" + dayd;
                        } else {
                            document.getElementById(xTarget).value = yeard + "-" + monthd + "-" + dayd;
                        }
                    }
                }
            }

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

        $('#last_name').keyup(function() {
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
    </script>
    <script>
        $('input:radio[name="type_id"]').change(function() {
            if ($(this).val() == 1) {

                $("#date_section").hide();
                $("#date").prop('required', false);

                $("#plage_horaire_section").hide();
                $("#plage_horaire").prop('required', false);


            } else {

                $("#date_section").show();
                $("#date").prop('required', true);

                $("#plage_horaire_section").show();
                $("#plage_horaire").prop('required', true);
            }
        });
    </script>
    <script src="{{ asset('assets/website/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/aos.js') }}"></script>
    <script src="{{ asset('assets/website/js/custom.js') }}"></script>
</body>

</html>
