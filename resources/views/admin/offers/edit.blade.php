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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.update') }}</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <a href="{{ route('admin.offers.index') }}" class="btn btn-primary" type="button">
                        <i class="mdi mdi-reply me-2"></i> {{ __('messages.form.back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-md-12">
            @include('admin.inc.messages')
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">{{ __('messages.form.update') }}</h4>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.offers.update', $offer->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row form-row">
                            <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">{{ __('messages.form.title') }}</h4>
                                <p>{{ $offer->title_offer }}</p>
                            </div>
                           
                            <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">{{ __('messages.form.country') }}</h4>
                                <p>{{ $offer->country }}</p>
                            </div>
                             <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">{{ __('messages.form.cities') }}</h4>
                                <p>{{ $offer->city }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">{{ __('messages.form.area') }} </h4>
                                <p>{{ $offer->secteurs->title_secteur }}</p>
                            </div>
                            
                            <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">{{ __('messages.form.numberplac') }}</h4>
                                <p>{{ $offer->vacancies }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">{{ __('messages.form.salary') }} min</h4>
                                <p> € {{ $offer->expected_salary_min }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">{{ __('messages.form.salary') }} max</h4>
                                <p> € {{ $offer->expected_salary_max }}</p>
                            </div>
                            
                            <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">{{ __('messages.form.datebegin') }} </h4>
                                <p> {{ \Carbon\Carbon::parse($offer->start_date)->format('d/m/Y') }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h4 class="mt-0 font-size-16">{{ __('messages.form.datefin') }}</h4>
                                <p> {{ $offer->end_date ? Carbon\Carbon::parse($offer->end_date)->format('d/m/Y') : 'N/A' }}
                                </p>
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
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-lg w-100 waves-effect waves-light">{{ __('messages.form.published') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('edit_offer')
    <script>
        // keyup function looks at the keys typed on the search box
        $('#client').on('keyup', function() {
            // the text typed in the input field is assigned to a variable
            var query = $(this).val();
            // call to an ajax function
            if (query == '') {

                $('#client_list').html("");
                $('#client_id').val("");

            } else {

                $.ajax({
                    // assign a controller function to perform search action - route name is search
                    url: "{{ route('getClients') }}",
                    // since we are getting data methos is assigned as GET
                    type: "GET",
                    // data are sent the server
                    data: {
                        'client': query
                    },
                    // if search is succcessfully done, this callback function is called
                    success: function(data) {
                        // print the search results in the div called country_list(id)
                        $('#client_list').html(data);
                    }
                })
                // end of ajax call
            }
        });
        // initiate a click function on each search result

        $(document).on('click', 'li.client_li', function() {
            // declare the value in the input field to a variable
            var value = $(this).text();
            // assign the value to the search box
            $('#client_id').val($(this).attr('data-id'))
            var query1 = $('#client_id').val();
            $('#client').val(value);
            // after click is done, search results segment is made empty
            $('#client_list').html("");
            //fetch_order_data(query1);
        });
    </script>
@endpush
