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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.update') }}</li>
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
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">{{ __('messages.form.update') }}</h4>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.posts.update', $post->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.title') }} <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="title_post"
                                        value="{{ $post->title_post }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.extract') }}</label>
                                    <input type="text" class="form-control" name="description_post"
                                        value="{{ $post->description_post }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.picturvideo') }}</label>
                                    <input type="file" class="form-control" name="cover_image">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.menu.category') }}</label>
                                    <select class="form-control select" name="category_id">
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $post->category_id === $item->id ? 'selected' : '' }}>
                                                {{ $item->title_categorie }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.contents') }} <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control service-desc" name="body_post">{{ $post->body_post }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="display-block">{{ __('messages.form.status') }}</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="blog_active"
                                            value="1" {{ $post->status == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="blog_active">
                                            {{ __('messages.form.active') }}
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="blog_inactive"
                                            value="0" {{ $post->status == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="blog_inactive">
                                            {{ __('messages.form.inactive') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit"
                            class="btn btn-primary btn-block w-100 waves-effect waves-light">{{ __('messages.form.update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
