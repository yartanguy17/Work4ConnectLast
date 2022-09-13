@extends('website.clients.layouts.app')

@section('title', 'Profil client')

@section('content')
    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->
            <div class="header_btm">
                <h2>Profil client</h2>
            </div>
        </div>
    </header>
    <main>
        <div class="job_container">
            <div class="container">
                <div class="row job_main">
                    <!---Side menu  -->
                    @include('website.clients.partials.side_menu')
                    <!---/ Side menu -->
                    <div class=" job_main_right">
                        <div class="row job_section">
                            <div class="col-sm-12">
                                <div class="jm_headings">
                                    <h5>Profil client</h5>
                                </div>
                                <div class="section-divider">
                                </div>
                                @include('website.inc.messages')
                                <form method="POST" action="{{ route('client.post_setting') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="big_form_group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label>Nom <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="last_name"
                                                        name="last_name" placeholder="" value="{{ $client->last_name }}"
                                                        required>
                                                </div>
                                            </div>

                                            @if ($client->personne_type == 'particulier')
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label>Prénom(s)</label>
                                                        <input type="text" class="form-control" id="first_name"
                                                            name="first_name" placeholder=""
                                                            value="{{ $client->first_name }}">
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($client->personne_type == 'entreprise')
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nom du Responsable<span
                                                                class="text-danger">*</span></label>
                                                        <input class="form-control" name="contact_name" id="contact_name"
                                                            value="{{ $client->contact_name }}" type="text">
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($client->personne_type == 'entreprise')
                                                <div class="col-12 col-sm-6" id="nif_section">
                                                    <div class="form-group">
                                                        <label>RC <span class="text-danger">*</span></label>
                                                        <input class="form-control" id="nif" name="nif"
                                                            value="{{ $client->nif }}" type="number">
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($client->personne_type == 'particulier')
                                                <div class="col-12 col-sm-6" id="gender_section">
                                                    <div class="form-group">
                                                        <label>Civilité <span class="text-danger">*</span></label>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="inlineRadio1" value="M"
                                                                {{ $client->gender == 'M' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="inlineRadio1">Mr</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="inlineRadio2" value="F"
                                                                {{ $client->gender == 'F' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="inlineRadio2">Mme</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="inlineRadio2" value="L"
                                                                {{ $client->gender == 'L' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="inlineRadio2">Mlle</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" placeholder="" name="email"
                                                        value="{{ $client->email }}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Ville</label>
                                                    <input type="text" class="form-control" placeholder="" name="ville_id"
                                                        value="{{ $client->villes->title_ville }}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label>Téléphone<span class="text-danger">*</span></label>
                                                    <input id="output" type="hidden" name="phone_number" value="" />
                                                    <input type="tel" id="phone" name="" class="form-control"
                                                        value="{{ $client->phone_number }}">
                                                </div>
                                            </div>

                                            @if ($client->personne_type == 'particulier')
                                                <div class="col-12 col-sm-6" id="birth_date_section">
                                                    <div class="form-group">
                                                        <label>Date de naissance </label>
                                                        <input class="form-control" id="birth_date" name="birth_date"
                                                            value="{{ $client->birth_date }}" type="date">
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($client->personne_type == 'entreprise')
                                                <div class="col-12 col-sm-6" id="date_creation_section">
                                                    <div class="form-group">
                                                        <label>Date de création </label>
                                                        <input class="form-control" id="date_creation"
                                                            name="date_creation" value="{{ $client->date_creation }}"
                                                            type="date">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="big_form_group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label>Adresse/Quartier/Localisation <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="address" placeholder=""
                                                        value="{{ $client->address }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="change-avatar">
                                                        <div class="profile-img">
                                                            @if ($client->profile_picture == null)
                                                                <img src="{{ asset('images/avatar.jpg') }}" alt=""
                                                                    id="blah">
                                                            @else
                                                                <img src="{{ asset('public/profil/' . $client->profile_picture) }}"
                                                                    alt="" id="blah">
                                                            @endif
                                                        </div>
                                                        <div class="upload-img">
                                                            <div class="change-photo-btn">
                                                                <span><i class="fa fa-upload"></i> Télécharger
                                                                    Photo/Logo</span>
                                                                <input type="file" class="upload" id="imgInp"
                                                                    name="profile_picture">
                                                            </div>
                                                            <small class="form-text text-muted">Format autorisé JPG ou PNG.
                                                                Taille maximale de 2MB</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group ">
                                                    <label>Description</label>
                                                    <textarea class="form-control" name="biography" {{ $client->biography }}> </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-9 ">
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('setting')
    <script type="text/javascript">
        $('#last_name').keyup(function() {
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

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#imgInp').change(function() {
            readURL(this)
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
        // keyup function looks at the keys typed on the search box
        $('#city').on('keyup', function() {
            // the text typed in the input field is assigned to a variable
            var query = $(this).val();
            // call to an ajax function
            if (query == '') {

                $('#city_list').html("");
                $('#city').val("");
            } else {

                $.ajax({
                    // assign a controller function to perform search action - route name is search
                    url: "{{ route('getVilles') }}",
                    // since we are getting data methos is assigned as GET
                    type: "GET",
                    // data are sent the server
                    data: {
                        'ville': query
                    },
                    // if search is succcessfully done, this callback function is called
                    success: function(data) {
                        // print the search results in the div called country_list(id)
                        $('#city_list').html(data);
                    }
                })
                // end of ajax call
            }
        });


        // initiate a click function on each search result
        $(document).on('click', 'li', function() {
            // declare the value in the input field to a variable
            var value = $(this).text();
            // assign the value to the search box
            $('#city').val($(this).attr('data-id'))
            // after click is done, search results segment is made empty
            $('#city_list').html("");
        });
    </script>
@endpush
