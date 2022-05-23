@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.trainings') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.menu.trainings') }}</h6>
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
                <div class="btn-toolbar p-3" role="toolbar"></div>
                <div class="card-body">
                    <div class="row form-row">
                        <div class="col-md-4 mb-3">
                            <h4 class="mt-0 font-size-16"><strong>{{ __('messages.menu.typeoftraining') }} </strong></h4>
                            <p>{{ $formation->types->title_type_for }} </p>
                        </div>

                        <div class="col-md-8 mb-3">
                            <h4 class="mt-0 font-size-16"><strong>{{ __('messages.form.title') }} </strong></h4>
                            <p>{{ $formation->title_formation }} </p>
                        </div>

                        <div class="col-md-12 mb-3">
                            <h4 class="mt-0 font-size-16"><strong>{{ __('messages.form.description') }} </strong></h4>
                            <p>{!! $formation->description_formation !!} </p>
                        </div>

                        <div class="col-md-4 mb-3">
                            <h4 class="mt-0 font-size-16"><strong>{{ __('messages.form.cost') }} </strong></h4>
                            <p>{{ $formation->cout_formation }} F.CFA</p>
                        </div>

                        <div class="col-md-4 mb-3">
                            <h4 class="mt-0 font-size-16"><strong>{{ __('messages.form.datebegin') }} </strong></h4>
                            <p>{{ Carbon\Carbon::parse($formation->date_debut)->format('d/m/Y') }}</p>
                        </div>

                        <div class="col-md-4 mb-3">
                            <h4 class="mt-0 font-size-16"><strong>{{ __('messages.form.datefin') }} </strong></h4>
                            <p>{{ Carbon\Carbon::parse($formation->date_fin)->format('d/m/Y') }} </p>
                        </div>

                        @if ($formation->document_formation != '')
                            <div class="col-md-12 mb-3">
                                <h4 class="mt-0 font-size-16"><strong>Document </strong></h4>
                                <p><i class="fas fa-file-download"></i> {{ $formation->document_formation }}</p>
                                <div class="py-0 text-left">
                                    <a href="{{ asset('public/attachments/' . $formation->document_formation) }}"
                                        class="fw-medium" download>{{ __('messages.form.download') }}</a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <hr>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary waves-effect mt-4"><i
                            class="mdi mdi-reply"></i> {{ __('messages.form.back') }}</a>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
