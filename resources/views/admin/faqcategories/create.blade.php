@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.faqscateg') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title"> {{ __('messages.menu.faqscateg') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.newfaqscateg') }}</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <a href="{{ route('admin.faqcategories.index') }}" class="btn btn-primary" type="button">
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
                        <h4 class="card-title">{{ __('messages.form.newfaqscateg') }}</h4>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.faqcategories.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row form-row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.title') }}</label>
                                    <input type="text" class="form-control" name="title_faq_cat"
                                        value="{{ old('title_faq_cat') }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.description') }}</label>
                                    <textarea cols="30" rows="4" class="form-control"
                                        name="description_faq_cat">{{ old('description_faq_cat') }}</textarea>
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
