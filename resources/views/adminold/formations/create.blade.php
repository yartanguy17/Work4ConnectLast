@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.trainings') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.menu.trainings') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.menu.trainings') }}</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <a href="{{ route('admin.formations.index') }}" class="btn btn-primary" type="button">
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
                        <h4 class="card-title">{{ __('messages.menu.trainings') }}</h4>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.formations.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row form-row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.menu.typeoftraining') }} <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control select" name="type_formation_id">
                                        @foreach ($types as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('type_formation_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->title_type_for }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.title') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title_formation"
                                        value="{{ old('title_formation') }}" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.datebegin') }} <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" id="date_debut" name="date_debut"
                                        value="{{ old('date_debut') }}" type="date" size="40">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.datefin') }} </label>
                                    <input class="form-control" id="date_fin" name="date_fin" type="date" size="40"
                                        value="{{ old('date_fin') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.cost') }} </label>
                                    <input type="number" class="form-control" placeholder=""
                                        value="{{ old('cout_formation') }}" name="cout_formation" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.download') }} </label>
                                    <input type="file" class="form-control" id="document" name="document">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.description') }} </label>
                                    <textarea cols="30" rows="4" class="form-control"
                                        name="description_formation">{{ old('description_formation') }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="display-block">{{ __('messages.form.state') }}</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status_formation"
                                                id="formation_active" value="1" checked
                                                {{ old('status_formation') == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formation_active">
                                                {{ __('messages.form.active') }}
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status_formation"
                                                id="formation_inactive" value="0"
                                                {{ old('status_formation') == '0' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formation_inactive">
                                                {{ __('messages.form.inactive') }}
                                            </label>
                                        </div>
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
@endsection
