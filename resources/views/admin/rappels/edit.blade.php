@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.becalled') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title"> {{ __('messages.menu.becalled') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="#"> {{ __('messages.menu.becalled') }}</a></li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <a href="{{ route('admin.rappels.index') }}" class="btn btn-primary" type="button">
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
                        <h4 class="card-title"> {{ __('messages.menu.becalled') }}</h4>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.rappels.update', $rappels->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.remark') }}</label>
                                    <textarea class="form-control" name="comment_rappel">{{ old('comment_rappel') }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="display-block">{{ __('messages.form.state') }}</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="1"
                                            {{ $rappels->status == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="">
                                            {{ __('messages.form.processed') }}
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="0"
                                            {{ $rappels->status == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="">
                                            {{ __('messages.form.pending') }}
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
