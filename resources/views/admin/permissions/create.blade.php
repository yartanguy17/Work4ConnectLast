@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.permissions') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.menu.permissions') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.newpermission') }}</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <a href="{{ route('admin.permissions.index') }}" class="btn btn-primary" type="button">
                        <i class="mdi mdi-reply me-2"></i> {{ __('messages.form.back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            @include('admin.inc.messages')
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">{{ __('messages.form.newpermission') }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    {{ Form::open(['url' => 'admin/permissions']) }}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group mb-3">
                                {{ Form::label('name', trans('messages.form.labels'), ['class' => 'form-label']) }}
                                {{ Form::text('name', '', ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit"
                        class="btn btn-primary btn-lg w-100 waves-effect waves-light">{{ __('messages.form.add') }}</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
