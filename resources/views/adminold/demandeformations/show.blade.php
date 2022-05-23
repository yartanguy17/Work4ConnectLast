@extends('admin.layouts.app')

@section('title')
    {{ __('messages.form.listtrainpro') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.form.listtrainpro') }}</h6>
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
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.title') }}</h4>
                            <p>{{ $demande->formation->title_formation }}</p>
                        </div>

                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.menu.typeoftraining') }}</h4>
                            <p>{{ $demande->formation->types->title_type_for }}</p>
                        </div>

                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.requdate') }}</h4>
                            <p>{{ \Carbon\Carbon::parse($demande->created_at)->format('d/m/Y') }}</p>
                        </div>

                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.jobseekername') }}</h4>
                            <p>{{ $demande->user->last_name }}</p>
                        </div>

                        @if ($demande->user->personne_type == 'particulier')
                            <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">{{ __('messages.form.first_name') }}</h4>
                                <p> {{ $demande->user->first_name }}</p>
                            </div>
                        @endif

                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.status') }}</h4>
                            <p>
                                @if ($demande->status)
                                    <span
                                        class="badge rounded-pill bg-success">{{ __('messages.form.published') }}</span>
                                @else
                                    <span class="badge rounded-pill bg-warning">{{ __('messages.form.pending') }}</span>
                                @endif
                            </p>
                        </div>

                        @if ($demande->status)
                            <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">{{ __('messages.form.opinion') }}</h4>
                                <p>
                                    @if ($demande->is_favorable)
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
                    <a href="{{ url()->previous() }}" class="btn btn-secondary waves-effect mt-4"><i
                            class="mdi mdi-reply"></i> {{ __('messages.form.back') }}</a>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
