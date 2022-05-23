@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.jobseeker') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.menu.jobseeker') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.update') }}</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <a href="{{ route('admin.prestataires.index') }}" class="btn btn-primary" type="button">
                        <i class="mdi mdi-reply me-2"></i> {{ __('messages.form.back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-md-12">
            @include('admin.inc.messages')
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">{{ __('messages.form.update') }}</h4>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.prestataires.update', $prestataire->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row form-row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.typejob') }}<span
                                            class="text-danger">*</span></label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="personne_type"
                                            value="particulier"
                                            {{ $prestataire->personne_type == 'particulier' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="">{{ __('messages.form.indiviual') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="personne_type" value="entreprise"
                                            {{ $prestataire->personne_type == 'entreprise' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="">{{ __('messages.form.company') }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.last_name') }} <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" id="last_name" name="last_name"
                                        value="{{ $prestataire->last_name }}" required type="text" size="40"
                                        placeholder="{{ __('messages.form.last_name') }}">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6" id="firstname_section">
                                <div class="form-group">
                                    <label class="form-label">{{ __('messages.form.first_name') }} <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" id="first_name" name="first_name"
                                        value="{{ $prestataire->first_name }}" type="text" size="40"
                                        placeholder="{{ __('messages.form.first_name') }}">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6" id="contact_name_section" style="display: none;">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.director') }}</label>
                                    <input class="form-control" id="contact_name" name="contact_name"
                                        value="{{ $prestataire->contact_name }}" type="text" size="40"
                                        placeholder="{{ __('messages.form.director') }}">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6" id="nif_section" style="display: none;">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.rc') }}</label>
                                    <input class="form-control" name="nif" value="{{ $prestataire->nif }}" type="text"
                                        size="40" placeholder="{{ __('messages.form.rc') }}">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.taxnumber') }}</label>
                                    <input class="form-control" name="num_impot" value="{{ $prestataire->num_impot }}"
                                        size="40" placeholder="{{ __('messages.form.taxnumber') }}">

                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.area') }}<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control select" name="secteur_activite_id">
                                        @foreach ($secteurs as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $prestataire->secteur_activite_id) selected='selected' @endif>
                                                {{ $item->title_secteur }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">{{ __('messages.form.email') }}</label>
                                    <input class="form-control" name="email" value="{{ $prestataire->email }}"
                                        size="40" placeholder="{{ __('messages.form.email') }}">
                                    <p id="result" style="font-style: italic; font-size: 12px"></p>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.phone') }}<span
                                            class="text-danger">*</span></label>
                                    <input id="output" type="hidden" name="phone_number" value="" />
                                    <input type="tel" id="phone" name="" class="form-control"
                                        value="{{ $prestataire->phone_number }}">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.phone_confir') }}<span
                                            class="text-danger">*</span></label>
                                    <input id="confirm_output" type="hidden" name="confirm_phone_number" value="" />
                                    <input type="tel" id="confirm_phone" name="" class="form-control"
                                        value="{{ $prestataire->phone_number }}">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6" id="date_creation_section" style="display: none;">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.dateCreat') }}</label>
                                    <input class="form-control" name="date_creation"
                                        value="{{ $prestataire->date_creation }}" type="date" size="40"
                                        placeholder="{{ __('messages.form.dateCreat') }}">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label>{{ __('messages.form.password') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label>{{ __('messages.form.passwordconfir') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password_confirmation" id="confirm">
                                    <br>
                                    <p id="message" style="font-style: italic; font-size: 12px"></p>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.city') }}<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control select" name="ville_id">
                                        @foreach ($villes as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $prestataire->ville_id) selected='selected' @endif>
                                                {{ $item->title_ville }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12" id="gender_section">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.civility') }} <span
                                            class="text-danger">*</span></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                                            value="M" {{ $prestataire->gender === 'M' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="inlineRadio1">{{ __('messages.form.mr') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                            value="F" {{ $prestataire->gender === 'F' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="inlineRadio2">{{ __('messages.form.mrs') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio3"
                                            value="L" {{ $prestataire->gender === 'L' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="inlineRadio3">{{ __('messages.form.miss') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit"
                            class="btn btn-primary btn-lg w-100 waves-effect waves-light">{{ __('messages.form.update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var e = document.getElementById("ddlViewBy");

        function show() {
            var as = document.forms[0].ddlViewBy.value;
            //  alert(as);
            if (as == 8) {
                $('#parent_cat_div').removeClass('d-none');


            } else {
                $('#parent_cat_div').addClass('d-none');
            }

        }
        e.onchange = show;
        show();


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
    </script>
@endsection
