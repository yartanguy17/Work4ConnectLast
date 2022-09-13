@extends('website.prestataires.layouts.app')

@section('title', 'Profil prestataire')

@section('content')
    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->
            <div class="header_btm">
                <h2>Profil prestataire </h2>
            </div>
        </div>
    </header>
    <main>
        <div class="job_container">
            <div class="container">
                <div class="row job_main">
                    <!---Side menu  -->
                    @include('website.prestataires.partials.side_menu')
                    <!---/ Side menu -->
                    <div class=" job_main_right">
                        <div class="row job_section">
                            <div class="col-sm-12">
                                <div class="jm_headings">
                                    <h5>Profil prestataire</h5>
                                </div>
                                <div class="section-divider">
                                </div>
                                @include('website.inc.messages')
                                <form method="POST" action="{{ route('prestataire.post_setting') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="big_form_group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label>Nom <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="last_name"
                                                        name="last_name" placeholder=""
                                                        value="{{ $prestataire->last_name }}" required>
                                                </div>
                                            </div>
                                            @if ($prestataire->personne_type == 'particulier')
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label>Prénom(s)</label>
                                                        <input type="text" class="form-control" id="first_name"
                                                            name="first_name" placeholder=""
                                                            value="{{ $prestataire->first_name }}">
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($prestataire->personne_type == 'entreprise')
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nom du Responsable<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="contact_name"
                                                            id="contact_name" value="{{ $prestataire->contact_name }}">
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($prestataire->personne_type == 'entreprise')
                                                <div class="col-12 col-sm-6" id="nif_section">
                                                    <div class="form-group">
                                                        <label>RC <span class="text-danger">*</span></label>
                                                        <input class="form-control" id="nif" name="nif"
                                                            value="{{ $prestataire->nif }}" type="number">
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($prestataire->personne_type == 'particulier')
                                                <div class="col-12 col-sm-6" id="gender_section">
                                                    <div class="form-group">
                                                        <label>Civilité <span class="text-danger">*</span></label>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="inlineRadio1" value="M"
                                                                {{ $prestataire->gender == 'M' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="inlineRadio1">Mr</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="inlineRadio2" value="F"
                                                                {{ $prestataire->gender == 'F' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="inlineRadio2">Mme</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="inlineRadio3" value="L"
                                                                {{ $prestataire->gender == 'L' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="inlineRadio3">Mlle</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" placeholder="" name="email"
                                                        value="{{ $prestataire->email }}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label>Téléphone<span class="text-danger">*</span></label>
                                                    <input id="output" type="hidden" name="phone_number" value="" />
                                                    <input type="tel" id="phone" name="" class="form-control"
                                                        value="{{ $prestataire->phone_number }}">
                                                </div>
                                            </div>

                                            @if ($prestataire->personne_type == 'particulier')
                                                <div class="col-12 col-sm-6" id="birth_date_section">
                                                    <div class="form-group">
                                                        <label>Date de naissance </label>
                                                        <input class="form-control" id="birth_date" name="birth_date"
                                                            value="{{ $prestataire->birth_date }}" type="date">
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($prestataire->personne_type == 'entreprise')
                                                <div class="col-12 col-sm-6" id="date_creation_section">
                                                    <div class="form-group">
                                                        <label>Date de création </label>
                                                        <input class="form-control" id="date_creation"
                                                            name="date_creation"
                                                            value="{{ $prestataire->date_creation }}" type="date">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="big_form_group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Numéro fiscal </label>
                                                    <input class="form-control " name="num_impot"
                                                        value="{{ $prestataire->num_impot }}" type="number"
                                                        placeholder="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label>Adresse/Quartier/Localisation </label>
                                                    <input type="text" class="form-control" name="address" placeholder=""
                                                        value="{{ $prestataire->address }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label>Prétention salariale</label>
                                                    <input type="number" class="form-control" placeholder=""
                                                        name="expected_salary"
                                                        value="{{ $prestataire->expected_salary }}" min="0"
                                                        oninput="validity.valid||(value='');">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label>Nombre d'année(s) d'experience</label>
                                                    <input type="number" class="form-control" placeholder=""
                                                        name="total_experience"
                                                        value="{{ $prestataire->total_experience }}" min="0"
                                                        oninput="validity.valid||(value='');">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Pièce d'indentité</label>
                                                    @if ($prestataire->personne_type == 'entreprise')
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="piece"
                                                                id="inlineRadio1" value="CNI" checked>
                                                            <label class="form-check-label" for="inlineRadio1">COE</label>
                                                        </div>
                                                    @else
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="piece"
                                                                id="inlineRadio1" value="CNI" checked>
                                                            <label class="form-check-label" for="inlineRadio1">CNI</label>
                                                        </div>
                                                    @endif

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="piece"
                                                            id="inlineRadio2" value="PASSEPORT">
                                                        <label class="form-check-label" for="inlineRadio2">PASSEPORT</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="piece"
                                                            id="inlineRadio3" value="CARTE D'ELECTEUR">
                                                        <label class="form-check-label" for="inlineRadio3">CARTE
                                                            D'ELECTEUR</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="big_form_group">
                                        <div class="row">
                                            <div class="col-md-6" id="cni_section">
                                                @if ($prestataire->personne_type == 'entreprise')
                                                    <div class="form-group">
                                                        <label>Numéro Carte d'operateur economique </label>
                                                        <input type="text" name="cni_num" id="cni_num"
                                                            class="form-control" value="{{ $prestataire->cni_num }}"
                                                            placeholder="">
                                                    </div>
                                                @else
                                                    <div class="form-group">
                                                        <label>Numéro Carte nationale d'identité </label>
                                                        <input type="text" name="cni_num" id="cni_num"
                                                            class="form-control" value="{{ $prestataire->cni_num }}"
                                                            placeholder="">
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-md-6" id="cni_file_section">
                                                <div class="form-group">
                                                    <div class="change-avatar">
                                                        <div class="profile-img">
                                                            <img src="{{ asset('/images/card.jpg') }}" alt=""
                                                                id="blahcni">
                                                        </div>
                                                        <div class="upload-img">
                                                            @if ($prestataire->personne_type == 'entreprise')
                                                                <div class="change-photo-btn">
                                                                    <span><i class="fa fa-upload"></i> Télécharger
                                                                        COE</span>
                                                                    <input type="file" class="upload" id="imgInpcni"
                                                                        name="cni_file" value="{{ old('cni_file') }}">
                                                                </div>
                                                            @else
                                                                <div class="change-photo-btn">
                                                                    <span><i class="fa fa-upload"></i> Télécharger
                                                                        CNI</span>
                                                                    <input type="file" class="upload" id="imgInpcni"
                                                                        name="cni_file" value="{{ old('cni_file') }}">
                                                                </div>
                                                            @endif
                                                            <small class="form-text text-muted">Format autorisé JPG ou PNG.
                                                                Taille maximale de 2MB</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6" id="passport_section" style="display: none;">
                                                <div class="form-group">
                                                    <label>Numéro du passeport</label>
                                                    <input type="text" name="passport_num" id="passport_num"
                                                        class="form-control" value="{{ $prestataire->passport_num }}"
                                                        placeholder="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Ville</label>
                                                    <input type="text" class="form-control" placeholder=""
                                                        name="ville_id" value="{{ $prestataire->villes->title_ville }}"
                                                        readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-6" id="passport_file_section" style="display: none;">
                                                <div class="form-group">
                                                    <div class="change-avatar">
                                                        <div class="profile-img">
                                                            <img src="{{ asset('/images/card.jpg') }}" alt=""
                                                                id="blahhpassport">
                                                        </div>
                                                        <div class="upload-img">
                                                            <div class="change-photo-btn">
                                                                <span><i class="fa fa-upload"></i> Passeport</span>
                                                                <input type="file" class="upload"
                                                                    id="imgInpppassport" name="passport_file">
                                                            </div>
                                                            <small class="form-text text-muted">Format autorisé JPG ou PNG.
                                                                Taille maximale de 2MB</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6" id="vote_card_section" style="display: none;">
                                                <div class="form-group">
                                                    <label>Numéro Carte d'électeur</label>
                                                    <input type="text" name="vote_card_num" id="vote_card_num"
                                                        class="form-control" value="{{ $prestataire->vote_card_num }}"
                                                        placeholder="">
                                                </div>
                                            </div>

                                            <div class="col-md-6" id="vote_card_file_section" style="display: none;">
                                                <div class="form-group">
                                                    <div class="change-avatar">
                                                        <div class="profile-img">
                                                            <img src="{{ asset('/images/card.jpg') }}" alt=""
                                                                id="blaahcard">
                                                        </div>
                                                        <div class="upload-img">
                                                            <div class="change-photo-btn">
                                                                <span><i class="fa fa-upload"></i> Carte elec.</span>
                                                                <input type="file" class="upload" id="imgInnpcard"
                                                                    name="vote_card_file">
                                                            </div>
                                                            <small class="form-text text-muted">Format autorisé JPG ou PNG.
                                                                Taille maximale de 2MB</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="big_form_group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="change-avatar">
                                                        <div class="profile-img">
                                                            @if ($prestataire->profile_picture == null)
                                                                <img src="{{ asset('images/avatar.jpg') }}" alt=""
                                                                    id="blah">
                                                            @else
                                                                <img src="{{ asset('public/profil/' . $prestataire->profile_picture) }}"
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
                                                    <label>Biographie</label>
                                                    <textarea class="form-control" name="biography">{{ $prestataire->biography }}</textarea>
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
        $('input:radio[name="piece"]').change(function() {

            if ($(this).val() == 'CNI') {

                $("#cni_section").show();
                $("#cni_num").prop('required', true);

                $("#cni_file_section").show();
                $("#cni_file").prop('required', true);

                $("#passport_section").hide();
                $("#passport_num").prop('required', false);

                $("#passport_file_section").hide();
                $("#passport_file").prop('required', false);

                $("#vote_card_section").hide();
                $("#vote_card_num").prop('required', false);

                $("#vote_card_file_section").hide();
                $("#vote_card_file").prop('required', false);

            } else if ($(this).val() == 'PASSEPORT') {

                $("#passport_section").show();
                $("#passport_num").prop('required', true);

                $("#passport_file_section").show();
                $("#passport_file").prop('required', true);

                $("#cni_section").hide();
                $("#cni_num").prop('required', false);

                $("#cni_file_section").hide();
                $("#cni_file").prop('required', false);

                $("#vote_card_section").hide();
                $("#vote_card_num").prop('required', false);

                $("#vote_card_file_section").hide();
                $("#vote_card_file").prop('required', false);


            } else if ($(this).val() == "CARTE D'ELECTEUR") {

                $("#vote_card_section").show();
                $("#vote_card_num").prop('required', true);

                $("#vote_card_file_section").show();
                $("#vote_card_file").prop('required', true);

                $("#cni_section").hide();
                $("#cni_num").prop('required', false);

                $("#cni_file_section").hide();
                $("#cni_file").prop('required', false);

                $("#passport_section").hide();
                $("#passport_num").prop('required', false);

                $("#passport_file_section").hide();
                $("#passport_file").prop('required', false);
            }
        });

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

        //Image upload CIN
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blahcni').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#imgInpcni').change(function() {
            readURL(this)
        });

        //Image upload PassePort
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader1 = new FileReader();
                reader1.onload = function(e) {
                    $('#blahhpassport').attr('src', e.target.result)
                }
                reader1.readAsDataURL(input.files[0]);
            }
        }
        $('#imgInpppassport').change(function() {
            readURL1(this)
        });

        //Image upload carte d electeur
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader2 = new FileReader();
                reader2.onload = function(e) {
                    $('#blaahcard').attr('src', e.target.result)
                }
                reader2.readAsDataURL(input.files[0]);
            }
        }
        $('#imgInnpcard').change(function() {
            readURL2(this)
        });

        //Image upload photo
        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader3 = new FileReader();
                reader3.onload = function(e) {
                    $('#blah').attr('src', e.target.result)
                }
                reader3.readAsDataURL(input.files[0]);
            }
        }

        $('#imgInp').change(function() {
            readURL3(this)
        });

        //Phone number
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
@endpush
