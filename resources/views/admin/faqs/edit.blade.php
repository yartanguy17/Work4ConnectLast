@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.faqs') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title"> {{ __('messages.menu.faqs') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.update') }}</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <a href="{{ route('admin.faqs.index') }}" class="btn btn-primary" type="button">
                        <i class="mdi mdi-reply me-2"></i> {{ __('messages.form.back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            @include('admin.inc.messages')
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">{{ __('messages.form.update') }}</h4>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.faqs.update', $faq->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row form-row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.menu.category') }}</label>
                                    <select class="form-control form-select" name="faq_category_id">
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $faq->faq_category_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->title_faq_cat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">Question </label>
                                    <textarea cols="30" rows="4" class="form-control" name="question_faq">{{ $faq->question_faq }}</textarea>
                                </div>
                            </div>


                            <div class="col-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.answers') }}</label>
                                    <textarea cols="30" rows="4" class="form-control" name="answer_faq">{{ $faq->answer_faq }}</textarea>
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
