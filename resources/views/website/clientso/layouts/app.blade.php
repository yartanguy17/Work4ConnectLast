<!doctype html>
<html lang="en">

<head>

    <!-- Basic Page Needs
================================================== -->
    <title>@yield('title') | Work4connect</title>
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
    <link rel="stylesheet" href="{{ asset('assets/website/scss/app.scss') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

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

        .change-photo-btn {
            background-color: #ff6158;
            border-radius: 50px;
            color: #fff;
            cursor: pointer;
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin: 0 auto;
            padding: 10px 15px;
            position: relative;
            transition: .3s;
            text-align: center;
            width: 220px;
        }

        .change-photo-btn input.upload {
            bottom: 0;
            cursor: pointer;
            filter: alpha(opacity=0);
            left: 0;
            margin: 0;
            opacity: 0;
            padding: 0;
            position: absolute;
            right: 0;
            top: 0;
            width: 220px;
        }

        .change-avatar {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .change-avatar .profile-img {
            margin-right: 15px;
        }

        .change-avatar .profile-img img {
            border-radius: 4px;
            height: 100px;
            width: 100px;
            object-fit: cover;
        }

        .change-avatar .change-photo-btn {
            margin: 0 0 10px;
            width: 150px;
        }

    </style>
</head>

<body>

    @yield('content')

    <!-- Footer Container
================================================== -->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up"></i></button>
    @include('website.partials.footer')

    <!-- End Footer Container
================================================== -->

    <!-- Scripts
================================================== -->
    <script src="{{ asset('assets/website/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <script type="text/javascript">
        $(window).on('load', function() {
            $(function() {
                ClassicEditor.create(document.querySelector('#classic-editor'))
                    .catch(error => {
                        console.error(error);
                    });

                ClassicEditor.create(document.querySelector('#classic-editor1'))
                    .catch(error => {
                        console.error(error);
                    });

                ClassicEditor.create(document.querySelector('#classic-editor2'))
                    .catch(error => {
                        console.error(error);
                    });
            });
        });
    </script>
    @stack('setting')
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
    <script type="text/javascript">
        function GetDays() {
            var beginDate = new Date(document.getElementById("begin_date").value);
            var endDate = new Date(document.getElementById("end_date").value);
            return parseInt((endDate - beginDate) / (24 * 3600 * 1000) + 1);
        }

        function NombreJours() {

            if (document.getElementById("end_date")) {
                document.getElementById("numdays").value = GetDays();
            }
        }

        $('document').ready(function() {
            $('textarea').each(function() {
                $(this).val($(this).val().trim());
            });
        });
    </script>

    <script src="{{ asset('assets/website/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/owl.carousel.min.js') }}"></script>
    <!-- A retirer-->
    <script src="{{ asset('assets/website/js/aos.js') }}"></script>
    <!--/ A retirer-->
    <script src="{{ asset('assets/website/js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</body>

</html>
