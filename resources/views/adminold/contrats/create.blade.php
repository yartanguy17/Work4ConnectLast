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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.newcontrat') }}</li>
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
                        <h4 class="card-title">{{ __('messages.menu.emp') }}</h4>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.contrats.store') }}" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row form-row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.customername') }}<span
                                            class="text-danger">*</span></label>
                                    <input type="hidden" name="client_id" id="client_id" value="{{ old('client_id') }}"
                                        class="form-control">
                                    <input class="form-control" name="client" id="client" required type="text" size="40"
                                        placeholder="{{ __('messages.form.customername') }}"
                                        value="{{ old('client') }}">
                                    <div id="client_list"></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.jobseekername') }}<span
                                            class="text-danger">*</span></label>
                                    <input type="hidden" name="prestataire_id" id="prestataire_id"
                                        value="{{ old('prestataire_id') }}" class="form-control">
                                    <input class="form-control" required name="prestataire" id="prestataire" type="text"
                                        size="40" placeholder="{{ __('messages.form.jobseekername') }}"
                                        value="{{ old('prestataire') }}">
                                    <div id="prestataire_list"></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.typeofjobseeker') }} <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" name="type_contrat">
                                        <option value="">{{ __('messages.form.choose') }}</option>
                                        <option value="MER" @if (old('type_contrat') == 'MER') {{ 'selected' }} @endif>
                                            {{ __('messages.form.linking') }}</option>
                                        <option value="SAL" @if (old('type_contrat') == 'SAL') {{ 'selected' }} @endif>
                                            {{ __('messages.form.employee') }}</option>
                                        <option value="MDP" @if (old('type_contrat') == 'MDP') {{ 'selected' }} @endif>
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
                                        value="{{ old('date_effet') ?? date('Y-m-d') }}" type="date" size="40">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.typeofcontract') }} <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control select" name="type_contrat_id">
                                        <option value="">{{ __('messages.form.selectContact') }}</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}"
                                                {{ old('type_contrat_id') == $type->id ? 'selected' : '' }}>
                                                {{ $type->title_type_con }}({{ $type->number_type_con }}
                                                {{ __('messages.form.day') }})
                                            </option>
                                        @endforeach
                                    </select>
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
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.daily') }} <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="number" id="daily_hourly_rate"
                                        name="daily_hourly_rate" value="{{ old('daily_hourly_rate') }}" type="text"
                                        size="40" onchange="NombreJourSalaire()" min="0"
                                        oninput="validity.valid||(value='');">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.dayswork') }} <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" id="working_day_week" name="working_day_week"
                                        value="{{ old('working_day_week') }}" type="number" size="40" min="0"
                                        oninput="validity.valid||(value='');">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.salary') }} <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" id="nbreheure" name="nbreheure"
                                        value="{{ old('nbreheure') }}" type="number" size="40"
                                        onchange="NombreJourSalaire()" min="0" oninput="validity.valid||(value='');">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.breakdown') }}</label>
                                    <textarea cols="30" rows="4" class="form-control"
                                        name="working_description">{{ old('working_description') }}</textarea>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.dailysal') }}</label>
                                    <input class="form-control" id="pay_per_hour" name="pay_per_hour" type="number"
                                        size="40" required readonly>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.period') }}</label>
                                    <select class="form-control select" name="type_versement">
                                        <option value="mensuel"
                                            @if (old('type_versement') == 'mensuel') {{ 'selected' }} @endif>
                                            {{ __('messages.form.monthly') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="display-block">{{ __('messages.form.status') }}</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="blog_active"
                                            value="1" checked {{ old('status') == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="blog_active">
                                            {{ __('messages.form.active') }}
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="blog_inactive"
                                            value="0" {{ old('status') == '0' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="blog_inactive">
                                            {{ __('messages.form.inactive') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.tax') }}<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" name="name_cnss" value="0.04" required type="text"
                                        size="40">
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
@endsection

@push('add_contrat')
    <script>
        const clientSearchBox = $('#client')
        const clientResultContainer = $('#client_list')
        const pickedClientId = $('#client_id')

        const providerSearchBox = $('#prestataire')
        const providerResultContainer = $('#prestataire_list')
        const pickedProviderId = $('#prestataire_id')


        const rebindClientList = (searchBox, resultContainer, pickedItemInput) => {
            $(resultContainer + ' [data-id]').each(function() {
                const _THIS = $(this)

                _THIS.off('click')
                _THIS.on('click', () => {
                    $(resultContainer).empty()
                    $(searchBox).val(_THIS.text())
                    $(pickedItemInput).val(_THIS.attr('data-id'))
                })
            })
        }


        clientSearchBox.on('keyup', function() {
            const searchValue = $(this).val()

            if (searchValue.length < 1) {
                clientResultContainer.empty()
                pickedClientId.val(null)
            } else {
                $.ajax({
                    url: "{{ route('getClients') }}",
                    type: "GET",
                    data: {
                        client: searchValue
                    },
                    success: function(data) {
                        clientResultContainer.html(data);
                        console.log(data)
                        rebindClientList('#client', '#client_list', '#client_id')
                    },

                    error: function() {
                        clientResultContainer.empty()
                        pickedClientId.val(null)
                    }
                })
            }
        });

        providerSearchBox.on('keyup', function() {
            const searchValue = $(this).val()

            if (searchValue.length < 1) {
                providerResultContainer.empty()
                pickedProviderId.val(null)
            } else {
                $.ajax({
                    url: "{{ route('getPrestataires') }}",
                    type: "GET",
                    data: {
                        prestataire: searchValue
                    },
                    success: function(data) {
                        providerResultContainer.html(data);
                        rebindClientList('#prestataire', '#prestataire_list', '#prestataire_id')
                    },

                    error: function() {
                        providerResultContainer.empty()
                        pickedProviderId.val(null)
                    }
                })
            }
        });
    </script>
@endpush
