@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.dashboard') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.menu.dashboard') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">{{ __('messages.home.hello') }} {{ auth()->user()->first_name }} !
                    </li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <div class="dropdown">
                        <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ trans('success.hours') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <a href="{{ route('admin.clients.index') }}">
                <div class="card mini-stat bg-success text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-start mini-stat-img me-4">
                                <img src="{{ asset('assets/admin/images/services-icon/01.png') }}" alt="">
                            </div>
                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">{{ __('messages.home.clients') }}
                            </h5>
                            <h4 class="fw-medium font-size-24">{{ $clients }} <i
                                    class="mdi mdi-arrow-up text-danger ms-2"></i></h4>
                            <div class="mini-stat-label bg-success">
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="float-end">
                                <i class="mdi mdi-arrow-right h5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6">
            <a href="{{ route('admin.prestataires.index') }}">
                <div class="card mini-stat bg-danger text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-start mini-stat-img me-4">
                                <img src="{{ asset('assets/admin/images/services-icon/02.png') }}" alt="">
                            </div>
                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">
                                {{ __('messages.home.jobseeker') }}</h5>
                            <h4 class="fw-medium font-size-24"> {{ $prestataires }} <i
                                    class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                            <div class="mini-stat-label bg-danger">
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="float-end">
                                <i class="mdi mdi-arrow-right h5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6">
            <a href="{{ route('admin.offer.pending') }}">
                <div class="card mini-stat bg-info text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-start mini-stat-img me-4">
                                <img src="{{ asset('assets/admin/images/services-icon/03.png') }}" alt="">
                            </div>
                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">{{ __('messages.home.announce') }}
                            </h5>
                            <h4 class="fw-medium font-size-24">{{ $offres }} <i
                                    class="mdi mdi-arrow-up text-danger ms-2"></i></h4>
                            <div class="mini-stat-label bg-info">
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="float-end">
                                <i class="mdi mdi-arrow-right h5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6">
            <a href="{{ route('admin.contrats.index') }}">
                <div class="card mini-stat bg-warning text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-start mini-stat-img me-4">
                                <img src="{{ asset('assets/admin/images/services-icon/04.png') }}" alt="">
                            </div>
                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">{{ __('messages.home.emp') }}</h5>
                            <h4 class="fw-medium font-size-24">{{ $contrats }} <i
                                    class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                            <div class="mini-stat-label bg-warning">
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="float-end">
                                <i class="mdi mdi-arrow-right h5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
