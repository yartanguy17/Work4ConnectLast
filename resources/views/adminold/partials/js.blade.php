<!-- JAVASCRIPT -->
<script src="{{ asset('assets/admin/libs/jquery/jquery.min.js') }}"></script>

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
        if ($(this).val() == 'particulier') {

            //console.log('Particulier')
            $("#date_creation_section").hide();
            $("#date_creation").prop('required', false);

            $("#contact_name_section").hide();
            //$("#contact_name").prop('required', false);

            $("#nif_section").hide();
            //$("#nif").prop('required', false);

            $("#birth_date_section").show();
            $("#birth_date").attr("required", true);

            $("#firstname_section").show();
            $("#firstname").attr("required", true);

            $("#gender_section").show();
            //$("#gender").attr("required", true);

        } else {

            //console.log('Entreprise')
            $("#date_creation_section").show();
            $("#date_creation").prop('required', false);

            $("#contact_name_section").show();
            // $("#contact_name").prop('required', true);

            $("#nif_section").show();
            $("#nif").prop('required', false);

            // $("#place_birth_section").hide();
            // $("#place_birth").prop('required',false);

            $("#birth_date_section").hide();
            $("#birth_date").prop('required', false);

            $("#firstname_section").hide();
            $("#firstname").prop('required', false);

            $("#gender_section").hide();
            $('input:radio[name="gender"]').prop('checked', false);
            // $("#gender").removeAttr("required", true);​​​​​

        }
    });

    $('input:radio[name="personne_typex"]').change(function() {
        if ($(this).val() == 'particulier') {

            //console.log('Particulier')
            $("#date_creation_section").hide();
            $("#date_creation").prop('required', false);
            $("#contact_name_section").hide();
            $("#nif_section").hide();
            $("#birth_date_section").show();
            $("#birth_date").attr("required", true);
            $("#firstname_section").show();
            $("#firstname").attr("required", true);
            $("#gender_section").show();

        } else {

            //console.log('Entreprise')
            $("#date_creation_section").show();
            $("#date_creation").prop('required', false);
            $("#contact_name_section").show();
            $("#nif_section").show();
            $("#birth_date_section").hide();
            $("#birth_date").prop('required', false);
            $("#firstname_section").hide();
            $("#firstname").prop('required', false);
            $("#gender_section").hide();
            $('input:radio[name="gender"]').prop('checked', false);
        }
    });


    $('input:radio[name="piece"]').change(function() {
        if ($(this).val() == 'CNI') {

            $("#cni_section").show();
            //$("#cni_num").prop('required', true);

            $("#cni_file_section").show();
            //$("#cni_file").prop('required', true);

            $("#passport_section").hide();
            //$("#passport_num").prop('required', false);

            $("#passport_file_section").hide();
            //$("#passport_file").prop('required', false);

            $("#vote_card_section").hide();
            //$("#vote_card_num").prop('required', false);

            $("#vote_card_file_section").hide();
            //$("#vote_card_file").prop('required', false);

        } else if ($(this).val() == 'PASSEPORT') {
            $("#passport_section").show();
            //$("#passport_num").prop('required', true);

            $("#passport_file_section").show();
            //$("#passport_file").prop('required', true);

            $("#cni_section").hide();
            //$("#cni_num").prop('required', false);

            $("#cni_file_section").hide();
            //$("#cni_file").prop('required', false);

            $("#vote_card_section").hide();
            //$("#vote_card_num").prop('required', false);

            $("#vote_card_file_section").hide();
            //$("#vote_card_file").prop('required', false);


        } else if ($(this).val() == "CARTE D'ELECTEUR") {

            $("#vote_card_section").show();
            //$("#vote_card_num").prop('required', true);

            $("#vote_card_file_section").show();
            // $("#vote_card_file").prop('required', true);

            $("#cni_section").hide();
            //$("#cni_num").prop('required', false);

            $("#cni_file_section").hide();
            //$("#cni_file").prop('required', false);

            $("#passport_section").hide();
            //$("#passport_num").prop('required', false);

            $("#passport_file_section").hide();
            //$("#passport_file").prop('required', false);
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
</script>
@stack('admin')
@stack('client')
@stack('prestataire')
@stack('role')
@stack('permission')
@stack('category')
@stack('faqcategory')
@stack('faq')
@stack('post')
@stack('add_post')
@stack('edit_post')
@stack('secteur')
@stack('scripts')
@stack('typecontrat')
@stack('typeformation')
@stack('demandeformation')
@stack('usertype')
@stack('offer')
@stack('add_offer')
@stack('edit_offer')
@stack('apply')
@stack('typequotation')
@stack('quotation')
@stack('reservation')
@stack('formation')
@stack('add_contrat')
@stack('edit_contrat')
@stack('contrat')
@stack('typeab')
@stack('demande')
@stack('typecong')
@stack('conge')
@stack('add_absence')
@stack('add_demande_conge')
@stack('signaler')
@stack('region')
@stack('ville')
@stack('jobtype')
<script>
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
        var str = $('#firstname').val();

        var spart = str.split(" ");
        for (var i = 0; i < spart.length; i++) {
            var j = spart[i].charAt(0).toUpperCase();
            spart[i] = j + spart[i].substr(1);
        }

        $('#firstname').val(spart.join(" "));

    });

    $('document').ready(function() {
        $('textarea').each(function() {
            $(this).val($(this).val().trim());
        });
    });
</script>

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

            ClassicEditor.create(document.querySelector('#classic-editor3'))
                .catch(error => {
                    console.error(error);
                });
        });
    });
</script>
<script src="{{ asset('assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/node-waves/waves.min.js') }}"></script>
<!-- Required datatable js -->
<script src="{{ asset('assets/admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
</script>
<!-- Datatable init js -->
<script src="{{ asset('assets/admin/js/pages/datatables.init.js') }}"></script>
<!-- Peity chart-->
<script src="{{ asset('assets/admin/libs/peity/jquery.peity.min.js') }}"></script>
<!-- Plugin Js-->
<script src="{{ asset('assets/admin/libs/chartist/chartist.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/pages/dashboard.init.js') }}"></script>
<script src="{{ asset('assets/admin/js/app.js') }}"></script>
<!-- SweetAlert2 -->
<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $.extend(true, $.fn.dataTable.defaults, {
        //"order" : [[0, "desc"]],
        //"order" : [[0, "asc"]],
        "language": {
            "search": "Recherche:",
            "oPaginate": {
                "sFirst": "Premier",
                "sLast": "Dernier",
                "sNext": "Suivant",
                "sPrevious": "Précédent"
            },
            "sInfo": "Afficher _START_ à _END_ des _TOTAL_ lignes",
            "sInfoEmpty": "Afficher 0 à 0 des 0 données",
            "sInfoFiltered": "Trié de _MAX_ lignes totales",
            "sEmptyTable": "Pas de données disponible dans la table",
            "sLengthMenu": "Afficher _MENU_ lignes",
            "sZeroRecords": "Aucune donnée correspondante trouvée",
            "sProcessing": "Traitement en cours ...",
            "oAria": {
                "sSortAscending": ": Activer pour trier la colonne par ordre croissant ",
                "sSortDescending": ": Activer pour trier la colonne par ordre décroissant"
            },
            "select": {
                "rows": {
                    "_": "%d lignes sélectionnées",
                    "0": "Aucune ligne sélectionnée",
                    "1": "1 ligne sélectionnée"
                }
            }
        }
    });

    $(document).ready(function() {
        $('#prodList').DataTable();
    });
</script>
<script type="text/javascript">
    function GetDays() {
        var beginDate = new Date(document.getElementById("begin_date").value);
        var endDate = new Date(document.getElementById("end_date").value);
        return parseInt((endDate - beginDate) / (24 * 3600 * 1000));
    }

    function NombreJours() {

        if (document.getElementById("end_date")) {
            document.getElementById("numdays").value = GetDays();
        }
    }
</script>

<script type="text/javascript">
    function GetSalaireJournalier() {
        var daily_hourly_rate = document.getElementById("daily_hourly_rate").value;
        var nbreheure = document.getElementById("nbreheure").value;
        return parseFloat((daily_hourly_rate * nbreheure));
    }

    function NombreJourSalaire() {

        if (document.getElementById("nbreheure")) {
            document.getElementById("pay_per_hour").value = GetSalaireJournalier();
        }
    }

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
