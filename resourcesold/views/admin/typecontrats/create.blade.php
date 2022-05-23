@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.typeofcontract') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.menu.typeofcontract') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.newtypeofcontract') }}</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <a href="{{ route('admin.typecontrats.index') }}" class="btn btn-primary" type="button">
                        <i class="mdi mdi-reply me-2"></i> {{ __('messages.form.back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            @include('admin.inc.messages')
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">{{ __('messages.form.newtypeofcontract') }}</h4>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.typecontrats.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row form-row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.title') }}</label>
                                    <input type="text" class="form-control" name="title_type_con"
                                        value="{{ old('title_type_con') }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.numberofd') }}</label>
                                    <input type="text" class="form-control" name="number_type_con"
                                        value="{{ old('number_type_con') }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.description') }}</label>
                                    <textarea cols="30" rows="4" class="form-control"
                                        name="description_type_con">{{ old('description_type_con') }}</textarea>
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
