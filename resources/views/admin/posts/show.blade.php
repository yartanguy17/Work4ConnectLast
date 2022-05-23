@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.posts') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.menu.posts') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.detail') }}</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary" type="button">
                        <i class="mdi mdi-reply me-2"></i> {{ __('messages.form.back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-sm-12">
            @include('admin.inc.messages')
            <div class="card">
                <img class="card-img-top img-fluid" src="{{ asset('public/attachments/' . $post->cover_image) }}"
                    alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title  mt-0">{{ $post->title_post }}</h4>
                    <p class="card-text">{!! $post->body_post !!} </p>
                </div>
            </div>
        </div>

        <div class="col-sm-12 text-let">
            <a class="btn btn-primary" href="{{ URL::previous() }}"><i class="fas fa-long-arrow-alt-left"></i>
                {{ __('messages.form.back') }}</a>
        </div>
    </div>
@endsection
