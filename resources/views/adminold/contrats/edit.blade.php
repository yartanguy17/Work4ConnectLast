@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.emp') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.menu.emp') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.update') }}</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <a href="{{ route('admin.contrats.index') }}" class="btn btn-primary" type="button">
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
                <form method="POST" action="{{ route('admin.contrats.update', $contrat->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row form-row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.customername') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="hidden" name="client_id" id="client_id"
                                        value="{{ $contrat->client->id }}" class="form-control">
                                    <input class="form-control" name="client" id="client" required type="text"
                                        value="{{ $contrat->client->last_name }} {{ $contrat->client->first_name }}"
                                        size="40" placeholder="{{ __('messages.form.customername') }}">
                                    <div id="client_list"></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.jobseekername') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="hidden" name="prestataire_id" id="prestataire_id"
                                        value="{{ $contrat->prestataire->id }}" class="form-control">
                                    <input class="form-control" required name="prestataire" id="prestataire" type="text"
                                        value="{{ $contrat->prestataire->last_name }} {{ $contrat->prestataire->first_name }}"
                                        size="40" placeholder="{{ __('messages.form.jobseekername') }} *">
                                    <div id="prestataire_list"></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.typeofjobseeker') }} <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" name="type_contrat">
                                        <option value="MER"
                                            @if (old('type_contrat') == 'MER') selected="selected" @elseif($contrat->type_contrat == 'MER') selected="selected" @endif>
                                            {{ __('messages.form.linking') }}</option>
                                        <option value="SAL"
                                            @if (old('type_contrat') == 'SAL') selected="selected" @elseif($contrat->type_contrat == 'SAL') selected="selected" @endif>
                                            {{ __('messages.form.employee') }}</option>
                                        <option value="MDP"
                                            @if (old('type_contrat') == 'MDP') selected="selected" @elseif($contrat->type_contrat == 'MDP') selected="selected" @endif>
                                            {{ __('messages.form.provision') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.dateeff') }} <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" id="date_effet" name="date_effet"
                                        value="{{ $contrat->date_effet }}" type="date" size="40">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.typeofcontract') }} <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control select" name="type_contrat_id">
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}"
                                                {{ $contrat->type_contrat_id == $type->id ? 'selected' : '' }}>
                                                {{ $type->title_type_con }}({{ $type->number_type_con }}
                                                {{ __('messages.form.day') }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.city') }}<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control select" name="ville_id">
                                        @foreach ($villes as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $contrat->ville_id) selected='selected' @endif>
                                                {{ $item->title_ville }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.daily') }} <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" id="daily_hourly_rate" name="daily_hourly_rate"
                                        value="{{ $contrat->daily_hourly_rate }}" type="number" size="40" min="0"
                                        oninput="validity.valid||(value='');">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.dayswork') }} <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" id="working_day_week" name="working_day_week"
                                        value="{{ $contrat->working_day_week }}" type="number" size="40" min="0"
                                        oninput="validity.valid||(value='');">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.salary') }} <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" id="nbreheure" name="nbreheure"
                                        value="{{ $contrat->nbreheure }}" type="number" size="40"
                                        onchange="NombreJourSalaire()" min="0" oninput="validity.valid||(value='');">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.breakdown') }}</label>
                                    <textarea cols="30" rows="4" class="form-control"
                                        name="working_description">{{ $contrat->working_description }}</textarea>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.dailysal') }} </label>
                                    <input class="form-control" id="pay_per_hour" name="pay_per_hour"
                                        value="{{ $contrat->pay_per_hour }}" required readonly type="number" size="40">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.period') }}</label>
                                    <select class="form-control select" name="type_versement">
                                        <option value="mensuel"
                                            @if (old('type_versement') == 'mensuel') selected="selected" @elseif($contrat->type_versement == 'mensuel') selected="selected" @endif>
                                            {{ __('messages.form.monthly') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="display-block">{{ __('messages.form.status') }} </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="blog_active"
                                            value="1" {{ $contrat->status == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="blog_active">
                                            {{ __('messages.form.active') }}
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="blog_inactive"
                                            value="0" {{ $contrat->status == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="blog_inactive">
                                            {{ __('messages.form.inactive') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.tax') }} <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" id="name_cnss" name="name_cnss"
                                        value="{{ $contrat->name_cnss }}" type="text" size="40">
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

@push('edit_contrat')
    <script>

    </script>
@endpush
