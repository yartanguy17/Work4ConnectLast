@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.clients') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.menu.clients') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.newcustomer') }}</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <a href="{{ route('admin.clients.index') }}" class="btn btn-primary" type="button">
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
                        <h4 class="card-title">{{ __('messages.form.newcustomer') }}</h4>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.clients.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row form-row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.typecustomer') }} <span
                                            class="text-danger">*</span></label>
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
                                    <input class="form-control" id="last_name" name="last_name"
                                        value="{{ old('last_name') }}" autofocus type="text" size="40"
                                        placeholder="{{ __('messages.form.last_name') }} ">

                                </div>
                            </div>

                            <div class="col-12 col-sm-6" id="contact_name_section" style="display: none;">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.director') }} </label>
                                    <input class="form-control" id="contact_name" name="contact_name" type="text"
                                        size="40" placeholder="{{ __('messages.form.director') }}">

                                </div>
                            </div>

                            <div class="col-12 col-sm-6" id="nif_section" style="display: none;">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.rc') }}</label>
                                    <input class="form-control" name="nif" value="{{ old('nif') }}" type="number"
                                        size="40" placeholder="{{ __('messages.form.rc') }}">

                                </div>
                            </div>

                            <div class="col-12 col-sm-6" id="firstname_section">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.first_name') }} <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" id="first_name" name="first_name"
                                        value="{{ old('first_name') }}" type="text" size="40"
                                        placeholder="{{ __('messages.form.first_name') }}">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.email') }} </label>
                                    <input type="email" class="form-control" id="email" name="email" size="40"
                                        placeholder="{{ __('messages.form.email') }} ">
                                    <p id="result" style="font-style: italic; font-size: 12px"></p>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.phone') }} <span
                                            class="text-danger">*</span></label>
                                    <input id="output" type="hidden" name="phone_number"
                                        value="{{ old('phone_number') }}" />
                                    <input type="tel" id="phone" name="" class="form-control"
                                        value="{{ old('phone_number') }}" size="40">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.phone_confir') }} <span
                                            class="text-danger">*</span></label>
                                    <input id="confirm_output" type="hidden" name="confirm_phone_number"
                                        value="{{ old('confirm_phone_number') }}" />
                                    <input type="tel" id="confirm_phone" name="" class="form-control"
                                        value="{{ old('confirm_phone_number') }}">
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
                                    <label class="form-label">{{ __('messages.form.city') }} <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control select" name="ville_id">
                                        <option value="">{{ __('messages.form.selectCity') }}</option>
                                        @foreach ($villes as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('ville_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->title_ville }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6" id="gender_section">
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

                            <div class="col-12 col-sm-6" id="date_creation_section" style="display: none;">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.dateCreat') }}</label>
                                    <input class="form-control" name="date_creation" value="{{ old('date_creation') }}"
                                        type="date" size="40" placeholder="{{ __('messages.form.dateCreat') }}">
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
