@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.announce') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.menu.announce') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.detail') }}</li>
                </ol>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row form-row">
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.title') }}</h4>
                            <p>{{ $offer->title_offer }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.typeofcontract') }}</h4>
                            <p>{{ $offer->typecontrat->title_type_con }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.city') }}</h4>
                            <p>{{ $offer->villes->title_ville }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.area') }} </h4>
                            <p>{{ $offer->secteurs->title_secteur }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.typeofjob') }}</h4>
                            <p>{{ $offer->types->title_job_ty }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.numberplac') }}</h4>
                            <p>{{ $offer->vacancies }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.salary') }}</h4>
                            <p>{{ $offer->expected_salary }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.numberyear') }}</h4>
                            <p>{{ $offer->total_experience }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.datebegin') }}</h4>
                            <p> {{ \Carbon\Carbon::parse($offer->start_date)->format('d/m/Y') }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.datefin') }}</h4>
                            <p> {{ $offer->end_date ? Carbon\Carbon::parse($offer->end_date)->format('d/m/Y') : 'N/A' }}
                            </p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.mission') }}</h4>
                            <p>{!! html_entity_decode($offer->mission) !!}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.requiredprof') }}</h4>
                            <p>{!! html_entity_decode($offer->profile) !!}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.description') }}</h4>
                            <p>{!! html_entity_decode($offer->description_offer) !!}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.opinion') }}</h4>
                            <p>
                                @if ($offer->status)
                                    <span class="text-success">{{ __('messages.form.published') }}</span>
                                @else
                                    <span class="text-danger">{{ __('messages.form.pending') }}</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.status') }}</h4>
                            <p>
                                @if ($offer->is_active)
                                    <span class="text-success">{{ __('messages.form.active') }}</span>
                                @else
                                    <span class="text-danger">{{ __('messages.form.inactive') }}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 text-let">
            <a class="btn btn-primary" href="{{ route('admin.offers.index') }}"><i
                    class="fas fa-long-arrow-alt-left"></i>
                {{ __('messages.form.back') }}</a>
        </div>
    </div>
@endsection
