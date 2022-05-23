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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.newjobseeker') }}</li>
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
                        <h4 class="card-title">{{ __('messages.menu.jobseeker') }}</h4>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.prestataires.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row form-row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.typejob') }}<span
                                            class="text-danger">*</span></label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="personne_type"
                                            value="particulier" checked
                                            {{ old('personne_type') == 'particulier' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="">{{ __('messages.form.indiviual') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="personne_type" value="entreprise"
                                            {{ old('personne_type') == 'entreprise' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="">{{ __('messages.form.company') }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.last_name') }} <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" id="last_name" name="last_name" required
                                        value="{{ old('last_name') }}" autofocus type="text" size="40"
                                        placeholder="{{ __('messages.form.last_name') }}" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6" id="firstname_section">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.first_name') }} <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" id="first_name" name="first_name" required
                                        value="{{ old('first_name') }}" autofocus type="text" size="40"
                                        placeholder="{{ __('messages.form.first_name') }}" autocomplete="off">
                                </div>
                            </div>

                            <div>
                                <div class="form-group d-none" id="parent_cat_div">
                                    <label for="parent_id">{{ __('messages.form.text') }}!</label>
                                    <input type="text" class="form-control" name="secteur_activite"
                                        placeholder="{{ __('messages.form.text') }}!" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6" id="contact_name_section" style="display: none;">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.director') }}</label>
                                    <input class="form-control" id="contact_name" name="contact_name" type="text"
                                        size="40" placeholder="{{ __('messages.form.director') }}" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6" id="nif_section" style="display: none;">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.rc') }}</label>
                                    <input class="form-control" name="nif" id="nif" value="{{ old('nif') }}"
                                        type="number" size="40" placeholder="{{ __('messages.form.rc') }}"
                                        autocomplete="off">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.taxnumber') }}</label>
                                    <input class="form-control" name="num_impot" value="{{ old('num_impot') }}"
                                        type="number" size="40" placeholder="{{ __('messages.form.taxnumber') }}"
                                        autocomplete="off">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.area') }}<span
                                            class="text-danger">*</span></label>
                                    {{-- j'ai ajouté la propriété required ici parce qu'il est obligatoire sur les deux vues --}}
                                    <select class="form-control select" name="secteur_activite_id" id="ddlViewBy" required>
                                        <option value="">{{ __('messages.form.selectArea') }}</option>
                                        @foreach ($secteurs as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('secteur_activite_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->title_secteur }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.email') }}</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="{{ old('email') }}" size="40"
                                        placeholder="{{ __('messages.form.email') }}" autocomplete="off">
                                    <p id="result" style="font-style: italic; font-size: 12px"></p>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.phone') }} <span
                                            class="text-danger">*</span></label>
                                    <input id="output" type="hidden" name="phone_number"
                                        value="{{ old('phone_number') }}" />
                                    {{-- j'ai ajouté la propriété required ici parce qu'il est obligatoire sur les deux vues --}}
                                    <input type="tel" id="phone" name="" class="form-control"
                                        value="{{ old('phone_number') }}" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.phone_confir') }}<span
                                            class="text-danger">*</span></label>
                                    <input id="confirm_output" type="hidden" name="confirm_phone_number"
                                        value="{{ old('confirm_phone_number') }}" />
                                    <input type="tel" id="confirm_phone" name="" class="form-control" required
                                        value="{{ old('confirm_phone_number') }}" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label>{{ __('messages.form.password') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control" required name="password" id="password">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label>{{ __('messages.form.passwordconfir') }}<span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control" required name="password_confirmation"
                                        id="confirm">
                                    <br>
                                    <p id="message" style="font-style: italic; font-size: 12px"></p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.city') }} <span
                                            class="text-danger">*</span></label>
                                    {{-- j'ai ajouté la propriété required ici parce qu'il est obligatoire sur les deux vues --}}
                                    <select class="form-control select" name="ville_id" required>
                                        <option value="">{{ __('messages.form.selectCity') }}</option>
                                        @foreach ($villes as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('ville_id') == $item->id ? 'selected' : '' }}>
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
                                            value="M" checked {{ old('gender') == 'M' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="inlineRadio1">{{ __('messages.form.mr') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                            value="F" {{ old('gender') == 'F' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="inlineRadio2">{{ __('messages.form.mrs') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio3"
                                            value="L" {{ old('gender') == 'L' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="inlineRadio3">{{ __('messages.form.miss') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit"
                            class="btn btn-primary btn-lg w-100 waves-effect waves-light">{{ __('messages.form.add') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
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
