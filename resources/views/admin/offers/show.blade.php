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
                   <div class="row">
                            <div class="col-md-4">
                               @if ($offer->logo == null)
                                        <img class="card-img-top img-fluid" src="{{ asset('images/blog.jpg') }}"
                                            alt="Card image cap" style="height: 100%;width:100%">
                                    @else
                                        <img alt="Card image cap"
                                            src="{{ asset('public/assets/logo-offer/'.$offer->logo) }}"
                                            class="card-img-top img-fluid" style="height: 100%;width:100%">
                                    @endif
                            </div>
                            <div class="col-md-4">
                                <div class="p-2">
                                    <h6 class="font-size-16"><strong>{{ __('welcome.form.title') }} </strong></h6>
                                    <p>{{ $offer->title_offer }}
                                    </p>
                                </div>
                            </div>



                         



                            <div class="col-md-4">
                                <div class="p-2">
                                    <h6 class="font-size-16"><strong>{{ __('welcome.form.area') }} </strong></h6>
                                    <p>{{ $offer->secteurs->title_secteur }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="p-2">
                                    <h6 class="font-size-16"><strong>Country</strong></h6>
                                    <p>{{ $offer->country }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-2">
                                    <h6 class="font-size-16"><strong>City</strong></h6>
                                    <p>{{ $offer->city }}
                                    </p>
                                </div>
                            </div>
                              <div class="col-md-4">
                                <div class="p-2">
                                    <h6 class="font-size-16"><strong>Registration page URL</strong></h6>
                                    <p> <a href="{{ $offer->web_site }}">{{ $offer->web_site }}</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-2">
                                    <h6 class="font-size-16"><strong>{{ __('welcome.form.numberof') }} </strong></h6>
                                    <p>{{ $offer->vacancies ? $offer->vacancies : 'N/A' }}

                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="p-2">
                                    <h6 class="font-size-16"><strong>{{ __('welcome.form.salary') }}</strong></h6>
                                    <p> € {{ $offer->expected_salary_min }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="p-2">
                                    <h6 class="font-size-16"><strong>{{ __('welcome.form.numberyear') }}</strong></h6>
                                    <p>
                                    {{ $offer->total_experience ? $offer->total_experience : 'N/A' }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="p-2">
                                    <h6 class="font-size-16"><strong>{{ __('welcome.form.datebegin') }}</strong></h6>
                                    <p>{{ Carbon\Carbon::parse($offer->start_date)->format('d/m/Y') }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="p-2">
                                    <h6 class="font-size-16"><strong>{{ __('welcome.form.datefin') }}</strong></h6>
                                    <p>{{ Carbon\Carbon::parse($offer->end_date)->format('d/m/Y') }}
                                    </p>
                                </div>
                            </div>

                            

                            <div class="col-md-4">
                                <div class="p-2">
                                    <h6 class="font-size-16"><strong>{{ __('welcome.form.description') }}</strong></h6>
                                    <p>{{ $offer->description_offer }}
                                    </p>
                                </div>
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
