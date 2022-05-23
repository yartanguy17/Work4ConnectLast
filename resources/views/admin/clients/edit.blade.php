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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.update') }}</li>
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
                        <h4 class="card-title">{{ __('messages.form.update') }}</h4>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.clients.update', $client->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row form-row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.typecustomer') }} <span
                                            class="text-danger">*</span></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="personne_type"
                                            value="particulier"
                                            {{ $client->personne_type == 'particulier' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="">{{ __('messages.form.indiviual') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="personne_type" value="entreprise"
                                            {{ $client->personne_type == 'entreprise' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="">{{ __('messages.form.company') }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.last_name') }} <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" id="last_name" name="last_name"
                                        value="{{ $client->last_name }}" type="text" size="40" placeholder="Nom *">

                                </div>
                            </div>

                            <div class="col-12 col-sm-6" id="contact_name_section" style="display: none;">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.director') }}</label>
                                    <input class="form-control" id="contact_name" name="contact_name"
                                        value="{{ $client->contact_name }}" type="text" size="40"
                                        placeholder="Nom du Responsable">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6" id="nif_section" style="display: none;">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.rc') }}</label>
                                    <input class="form-control" name="nif" value="{{ $client->nif }}" type="number"
                                        size="40" placeholder="RC">

                                </div>
                            </div>

                            <div class="col-12 col-sm-6" id="firstname_section">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.first_name') }}<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" id="first_name" name="first_name"
                                        value="{{ $client->first_name }}" type="text" size="40" placeholder="Prénom(s) ">

                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.email') }} </label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $client->email }}" size="40"
                                        placeholder="{{ __('messages.form.email') }}">
                                    <p id="result" style="font-style: italic; font-size: 12px"></p>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.phone') }} <span
                                            class="text-danger">*</span></label>
                                    <input id="output" type="hidden" name="phone_number" value="" />
                                    <input type="tel" id="phone" name="" class="form-control"
                                        value="{{ $client->phone_number }}" size="40">
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
                                    <input class="form-control" type="password" name="password_confirmation" id="confirm">
                                    <br>
                                    <p id="message" style="font-style: italic; font-size: 12px"></p>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.phone_confir') }} <span
                                            class="text-danger">*</span></label>
                                    <input id="confirm_output" type="hidden" name="confirm_phone_number" value="" />
                                    <input type="tel" id="confirm_phone" name="" class="form-control"
                                        value="{{ $client->phone_number }}">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.city') }}<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control select" name="ville_id">
                                        @foreach ($villes as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $client->ville_id) selected='selected' @endif>
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
                                            value="M" {{ $client->gender === 'M' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="inlineRadio1">{{ __('messages.form.mr') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                            value="F" {{ $client->gender === 'F' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="inlineRadio2">{{ __('messages.form.mrs') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio3"
                                            value="L" {{ $client->gender === 'L' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="inlineRadio3">{{ __('messages.form.miss') }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6" id="date_creation_section" style="display: none;">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.dateCreat') }}</label>
                                    <input class="form-control" name="date_creation"
                                        value="{{ $client->date_creation }}" type="date" size="40"
                                        placeholder="{{ __('messages.form.dateCreat') }}">
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
@endsection
