@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.training') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title"> {{ __('messages.menu.training') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.update') }}</li>
                </ol>
            </div>
            <div class="col-md-4">

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
                        <h4 class="card-title">{{ __('messages.form.procedtraing') }}</h4>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.demandeformations.update', $demande->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.menu.trainings') }}</label>
                                    <select class="form-control select" name="formation_id" id="formation_id">
                                        @foreach ($formations as $formation)
                                            <option value="{{ $formation->id }}"
                                                {{ $demande->formation_id == $formation->id ? 'selected' : '' }}>
                                                {{ $formation->title_formation }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.pattern') }}</label>
                                    <input type="text" class="form-control" placeholder="" name="motif_dem_for"
                                        value="{{ $demande->motif_dem_for }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.description') }}</label>
                                    <textarea class="form-control" name="description_dem_for">{!! $demande->description_dem_for !!}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.decision') }}</label>
                                    <textarea class="form-control" name="decision_dem_for">{!! $demande->decision_dem_for !!}</textarea>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="display-block">{{ __('messages.form.opinion') }}</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_favorable" id="favorable"
                                            value="1" {{ $demande->is_favorable == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="favorable">
                                            Favorable
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_favorable" id="not_favorable"
                                            value="0" {{ $demande->is_favorable == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="not_favorable">
                                            {{ __('messages.form.notfavorable') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit"
                            class="btn btn-primary btn-lg w-100 waves-effect waves-light">{{ __('messages.form.treat') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
