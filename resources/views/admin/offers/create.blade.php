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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.newannounce') }}</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <a href="{{ route('admin.offer.pending') }}" class="btn btn-primary" type="button">
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
                        <h4 class="card-title">{{ __('messages.menu.announce') }}</h4>
                    </div>
                </div>
                <form action="{{ route('admin.offers.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="form-group mb-3">
                                <label class="form-label">{{ __('messages.form.customername') }} <span
                                        class="text-danger">*</span></label>
                                <input type="hidden" name="client_id" id="client_id" class="form-control">
                                <input class="form-control" name="client" id="client" required type="text" size="40"
                                    placeholder="{{ __('messages.form.customername') }}*">
                                <div id="client_list"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.title') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="" name="title_offer"
                                        value="{{ old('title_offer') }}" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.typeofcontract') }} <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control select" name="type_contrat_id">
                                        <option value="">{{ __('messages.form.selectContact') }}</option>
                                        @foreach ($typecontrats as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('type_contrat_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->title_type_con }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.city') }} <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control select" name="ville_id">
                                        <option value="">{{ __('messages.form.selectCity') }}</option>
                                        @foreach ($villes as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('ville_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->title_ville }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.area') }} <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control select" name="secteur_activite_id" id="ddlViewBy">
                                        <option value="">{{ __('messages.form.selectArea') }}</option>
                                        @foreach ($secteurs as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('secteur_activite_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->title_secteur }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div>
                                <div class="form-group d-none" id="parent_cat_div">
                                    <label for="parent_id">{{ __('messages.form.text') }}!</label>
                                    <input type="text" class="form-control" name="secteur_activite"
                                        placeholder="{{ __('messages.form.text') }}!" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.typeofjob') }} <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control select" name="job_type_id">
                                        <option value="">{{ __('messages.form.selectJob') }}</option>
                                        @foreach ($types as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('job_type_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->title_job_ty }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.numberplac') }}</label>
                                    <input type="number" class="form-control" placeholder="" value="1" name="vacancies"
                                        min="0" oninput="validity.valid||(value='');">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.salary') }} </label>
                                    <input type="number" class="form-control" placeholder="" name="expected_salary"
                                        value="{{ old('expected_salary') }}" min="0"
                                        oninput="validity.valid||(value='');">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.numberyear') }}</label>
                                    <input type="number" class="form-control" placeholder="" value="0"
                                        name="total_experience" min="0" oninput="validity.valid||(value='');">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.datebegin') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" placeholder="" name="start_date"
                                        value="{{ old('start_date') ?? date('Y-m-d', strtotime('+8 days')) }}">
                                    <span class="text-danger">{{ __('messages.form.minimum') }}</span>
                                </div>
                            </div>
                           

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.description') }}</label>
                                    <textarea class="form-control" name="description_offer">{{ old('description_offer') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="display-block">{{ __('messages.form.state') }}</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_active" id="offer_active"
                                            value="1" checked {{ old('is_active') == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="offer_active">
                                            {{ __('messages.form.active') }}
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_active" id="offer_inactive"
                                            value="0" {{ old('is_active') == '0' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="offer_inactive">
                                            {{ __('messages.form.inactive') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="display-block">{{ __('messages.form.status') }}</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="blog_active"
                                            value="1" checked {{ old('status') == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="blog_active">
                                            {{ __('messages.form.published') }}
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="blog_inactive"
                                            value="0" {{ old('status') == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="blog_inactive">
                                            {{ __('messages.form.pending') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit"
                            class="btn btn-primary btn-lg w-100 waves-effect waves-light">{{ __('messages.form.add') }}</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@push('add_offer')
    <script>
        var e = document.getElementById("ddlViewBy");

        function show() {
            var as = document.forms[0].ddlViewBy.value;
            //  alert(as);
            if (as == 8) {
                $('#parent_cat_div').removeClass('d-none');


            } else {
                $('#parent_cat_div').addClass('d-none');
            }

        }
        e.onchange = show;
        show();
    </script>

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
