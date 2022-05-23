@extends('admin.layouts.app')

@section('title')
    {{ __('messages.form.apply') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.form.apply') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.apply') }}</li>
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
                        <h4 class="card-title">{{ __('messages.form.apply') }}</h4>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.offers.updateApply', $offer->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="form-group mb-3">
                                <label class="form-label">{{ __('messages.form.jobseekername') }} <span
                                        class="text-danger">*</span></label>
                                <input type="hidden" name="prestataire_id" id="prestataire_id" class="form-control">
                                <input class="form-control" name="prestataire" id="prestataire" required type="text"
                                    size="40" placeholder="{{ __('messages.form.jobseekername') }}*">
                                <div id="prestataire_list"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.download') }}</label>
                                    <input type="file" class="form-control" name="cv_file">
                                    <small>{{ __('messages.form.format') }}</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.coverletter') }}</label>
                                    <input type="file" class="form-control" name="cover_letter_file">
                                    <small>{{ __('messages.form.format') }}</small>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.description') }}</label>
                                    <textarea class="form-control" name="cover_letter">{{ old('cover_letter') }}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="display-block">{{ __('messages.form.opinion') }} </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_favorable" value="1" checked>
                                        <label class="form-check-label" for="">
                                            Favorable
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_favorable" value="0">
                                        <label class="form-check-label" for="">
                                            {{ __('messages.form.notfavorable') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="display-block">{{ __('messages.form.state') }}</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="1" checked>
                                        <label class="form-check-label" for="">
                                            {{ __('messages.form.active') }}
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="0">
                                        <label class="form-check-label" for="">
                                            {{ __('messages.form.inactive') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit"
                            class="btn btn-primary btn-lg w-100 waves-effect waves-light">{{ __('messages.form.apply') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('add_offer')
    <script>
        // keyup function looks at the keys typed on the search box
        $('#prestataire').on('keyup', function() {
            // the text typed in the input field is assigned to a variable
            var query = $(this).val();
            // call to an ajax function
            if (query == '') {

                $('#prestataire_list').html("");
                $('#prestataire_id').val("");

            } else {

                $.ajax({
                    // assign a controller function to perform search action - route name is search
                    url: "{{ route('getPrestataires') }}",
                    // since we are getting data methos is assigned as GET
                    type: "GET",
                    // data are sent the server
                    data: {
                        'prestataire': query
                    },
                    // if search is succcessfully done, this callback function is called
                    success: function(data) {
                        // print the search results in the div called country_list(id)
                        $('#prestataire_list').html(data);
                    }
                })
                // end of ajax call
            }
        });
        // initiate a click function on each search result

        $(document).on('click', 'li.prestataire_li', function() {
            // declare the value in the input field to a variable
            var value = $(this).text();
            // assign the value to the search box
            $('#prestataire_id').val($(this).attr('data-id'))
            var query1 = $('#prestataire_id').val();
            $('#prestataire').val(value);
            // after click is done, search results segment is made empty
            $('#prestataire_list').html("");
            //fetch_order_data(query1);
        });
    </script>
@endpush
