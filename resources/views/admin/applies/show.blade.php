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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.detail') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="btn-toolbar p-3" role="toolbar">
                </div>
                <div class="card-body">
                    <div class="row form-row">
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.title') }}</h4>
                            <p>{{ $apply->offer->title_offer }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.typeofjob') }}</h4>
                            <p>{{ $apply->offer->types->title_job_ty }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.typeofcontract') }}</h4>
                            <p>{{ $apply->offer->typecontrat->title_type_con }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.dateApp') }}</h4>
                            <p>{{ \Carbon\Carbon::parse($apply->created_at)->format('d/m/Y') }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.area') }}</h4>
                            <p>{{ $apply->offer->secteurs->title_secteur }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.customername') }}</h4>
                            <p>{{ $apply->offer->user->last_name }} {{ $apply->offer->user->first_name }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.jobseekername') }}</h4>
                            <p>{{ $apply->user->last_name }}</p>
                        </div>
                        @if ($apply->user->type_users == 'prestataire')
                            <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">{{ __('messages.form.first_name') }}</h4>
                                <p> {{ $apply->user->first_name }}</p>
                            </div>
                        @endif
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.resfile') }}</h4>
                            <div class="py-0 text-left">
                                @if ($apply->cv_file == '')
                                    N/A
                                @else
                                    <a href="{{ asset('public/dossier/' . $apply->cv_file) }}" class="fw-medium"
                                        download>{{ __('messages.form.download') }}</a>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.coverletterfile') }}</h4>
                            <div class="py-0 text-left">
                                @if ($apply->cover_letter_file == '')
                                    N/A
                                @else
                                    <a href="{{ asset('public/dossier/' . $apply->cover_letter_file) }}"
                                        class="fw-medium" download>{{ __('messages.form.download') }}</a>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.coverletter') }}</h4>
                            <p>{{ $apply->cover_letter ? $apply->cover_letter : 'N/A' }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.status') }}</h4>
                            <p>
                                @if ($apply->status)
                                    <span
                                        class="badge rounded-pill bg-success">{{ __('messages.form.processed') }}</span>
                                @else
                                    <span class="badge rounded-pill bg-warning">{{ __('messages.form.pending') }}</span>
                                @endif
                            </p>
                        </div>
                        @if ($apply->status)
                            <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">{{ __('messages.form.opinion') }}</h4>
                                <p>
                                    @if ($apply->is_favorable)
                                        <span class="badge rounded-pill bg-success">Favorable</span>
                                    @else
                                        <span
                                            class="badge rounded-pill bg-danger">{{ __('messages.form.notfavorable') }}</span>
                                    @endif
                                </p>
                            </div>
                        @endif
                    </div>
                    <hr>
                    <a href="{{ route('admin.applies.index') }}" class="btn btn-primary waves-effect mt-4"><i
                            class="mdi mdi-reply"></i> {{ __('messages.form.back') }}</a>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
