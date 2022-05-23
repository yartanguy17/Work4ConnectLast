@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.jobseeker') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.menu.jobseeker') }}</h6>
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
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.typejob') }}</h4>
                            <p>{{ $prestataire->personne_type }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.last_name') }}</h4>
                            <p>{{ $prestataire->last_name }}</p>
                        </div>
                        @if ($prestataire->personne_type == 'entreprise')
                            <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">{{ __('messages.form.director') }}</h4>
                                <p>{{ $prestataire->contact_name }}</p>
                            </div>
                        @endif

                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16"> {{ __('messages.form.rc') }}</h4>
                            <p>{{ $prestataire->nif }}</p>
                        </div>

                        @if ($prestataire->personne_type == 'particulier')
                            <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">{{ __('messages.form.first_name') }}</h4>
                                <p>{{ $prestataire->first_name }}</p>
                            </div>
                        @endif

                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.taxnumber') }}</h4>
                            <p>{{ $prestataire->num_impot }}</p>
                        </div>

                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.email') }}</h4>
                            <p>{{ $prestataire->email }}</p>
                        </div>

                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.phone') }}</h4>
                            <p>{{ $prestataire->phone_number }}</p>
                        </div>

                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.city') }}</h4>
                            <p>{{ $prestataire->villes->title_ville }}</p>
                        </div>

                        @if ($prestataire->personne_type == 'particulier')
                            <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">{{ __('messages.form.civility') }}</h4>
                                <p>
                                    @if ($prestataire->gender == 'M')
                                        {{ __('messages.form.man') }}
                                    @else
                                        {{ __('messages.form.women') }}
                                    @endif
                                </p>
                            </div>
                        @endif
                        @if ($prestataire->personne_type == 'entreprise')
                            <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">{{ __('messages.form.dateCreat') }}</h4>
                                <p>{{ \Carbon\Carbon::parse($prestataire->date_creation)->format('d/m/Y') }}</p>
                            </div>
                        @endif

                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.area') }}</h4>
                            <p>{{ $prestataire->secteurs->title_secteur }}</p>
                        </div>
                    </div>
                    <hr>
                    <a href="{{ route('admin.prestataires.index') }}" class="btn btn-secondary waves-effect mt-4"><i
                            class="mdi mdi-reply"></i> {{ __('messages.form.back') }}</a>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
