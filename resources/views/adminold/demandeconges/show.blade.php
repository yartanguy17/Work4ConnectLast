@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.holiday') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title"> {{ __('messages.menu.holiday') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.detail') }}</li>
                </ol>
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
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.names') }}</h4>
                            <p>{{ $demandeconges->users->last_name }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.firstname') }}</h4>
                            <p>{{ $demandeconges->users->first_name }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.datebegin') }}</h4>
                            <p>{{ $demandeconges->date_demande_conge ? date('d/m/Y', strtotime($demandeconges->date_demande_conge)) : 'N/A' }}
                            </p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.menu.typeholiday') }} </h4>
                            <p>{{ $demandeconges->typeconges->type_conge_name }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.pattern') }}</h4>
                            <p>{{ $demandeconges->motif_conge }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.recodate') }}</h4>
                            <p>{{ $demandeconges->date_reprise_conge ? date('d/m/Y', strtotime($demandeconges->date_reprise_conge)) : 'N/A' }}
                            </p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.numberofd') }}</h4>
                            <p>{{ $demandeconges->number_day }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.pattern') }}</h4>
                            <p>{{ $demandeconges->comment_conge ? $demandeabsences->comment_conge : 'N/A' }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.state') }}</h4>
                            <p>
                                @if ($demandeconges->is_valide == 0)
                                    <label class="text-danger">{{ __('messages.form.pending') }}</label>
                                @elseif($demandeconges->is_valide == 1)
                                    <label class="text-success">{{ __('messages.form.accept') }}</label>
                                @elseif($demandeconges->is_valide == 2)
                                    <label class="text-danger">{{ __('messages.form.reject') }}</label>
                                @endif
                            </p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.dateeff') }}</h4>
                            <p> {{ $demandeconges->date_effet ? date('d/m/Y', strtotime($demandeabsences->date_effet)) : 'N/A' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 text-let">
            <a class="btn btn-primary" href="{{ route('admin.demandeconges.index') }}"><i
                    class="fas fa-long-arrow-alt-left"></i>
                {{ __('messages.form.back') }}</a>
        </div>
    </div>
@endsection
