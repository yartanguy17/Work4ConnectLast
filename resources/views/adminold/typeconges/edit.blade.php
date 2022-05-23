@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.typeholiday') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title"> {{ __('messages.menu.typeholiday') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.update') }}</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <a href="{{ route('admin.typeconges.index') }}" class="btn btn-primary" type="button">
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
                        <h4 class="card-title">{{ __('messages.form.update') }}</h4>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.typeconges.update', Crypt::encrypt($typeconges->id)) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row form-row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.menu.typeholiday') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="type_conge_name"
                                        value="{{ $typeconges->type_conge_name }}" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('messages.form.update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
