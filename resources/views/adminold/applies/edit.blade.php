@extends('admin.layouts.app')

@section('title')
    {{ __('messages.form.application') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.form.application') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.update') }}</li>
                </ol>
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
                        <h4 class="card-title">{{ __('messages.form.application') }}</h4>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.applies.update', $apply->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.decision') }}</label>
                                    <textarea class="form-control" name="decision">{!! $apply->decision !!}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="display-block">{{ __('messages.form.opinion') }}</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_favorable" value="1"
                                            {{ $apply->is_favorable == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="">
                                            Favorable
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_favorable" value="0"
                                            {{ $apply->is_favorable == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="">
                                            {{ __('messages.form.notfavorable') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="display-block">{{ __('messages.form.status') }} </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="1"
                                            {{ $apply->status == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="">
                                            {{ __('messages.form.active') }}
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="0"
                                            {{ $apply->status == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="">
                                            {{ __('messages.form.inactive') }}
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
