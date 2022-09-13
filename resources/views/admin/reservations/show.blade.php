@extends('admin.layouts.app')

@section('title')
    {{ __('messages.form.pendarchiv') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.form.pendarchiv') }}</h6>
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
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.dateres') }}</h4>
                            <p>{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y') }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.tabname') }}</h4>
                            <p>{{ $reservation->clients->last_name }} {{ $reservation->clients->first_name }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.tabname') }} </h4>
                            <p>{{ $reservation->prestataires->last_name }}
                                {{ $reservation->prestataires->first_name }}
                            </p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">{{ __('messages.form.status') }}</h4>
                            <p>
                                @if ($reservation->status)
                                    <span
                                        class="badge rounded-pill bg-success">{{ __('messages.form.processed') }}</span>
                                @else
                                    <span class="badge rounded-pill bg-warning">{{ __('messages.form.pending') }}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <hr>
                    <a href="{{ route('admin.reservations.index') }}" class="btn btn-secondary waves-effect mt-4"><i
                            class="mdi mdi-reply"></i> {{ __('messages.form.back') }}</a>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
