@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.holiday') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.menu.holiday') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> {{ __('messages.menu.holiday') }}</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <a href="{{ route('admin.demandeconges.index') }}" class="btn btn-success" type="button"><i
                            class="mdi mdi-reply me-2"></i> {{ __('messages.form.back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12 offset-lg-12">
            @include('admin.inc.messages')
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title"> {{ __('messages.menu.holiday') }}</h4>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.demandeconges.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row form-row">
                            <div class="col-6 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.jobseekername') }}<span
                                            class="text-danger">*</span></label>
                                    <input type="hidden" name="prestataire_id" id="prestataire_id" class="form-control">
                                    <input class="form-control" required name="prestataire" id="prestataire" type="text"
                                        size="40" placeholder="{{ __('messages.form.jobseekername') }}*">
                                    <div id="prestataire_list"></div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.menu.typeholiday') }}<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" name="type_conge_id">
                                        <option value="">{{ __('messages.form.choose') }}</option>
                                        @foreach ($typeconges as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('type_conge_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->type_conge_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-row">
                            <div class="col-6 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.datebegin') }}<span
                                            class="text-danger">*</span></label>
                                    <input type="date" id="begin_date" class="form-control" name="date_demande_conge"
                                        value="{{ old('date_demande_conge') ?? date('Y-m-d') }}"
                                        onchange="NombreJours()">
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.datefin') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="date" id="end_date" class="form-control" name="date_return_conge"
                                        value="{{ old('date_return_conge') ?? date('Y-m-d') }}" onchange="NombreJours()">
                                </div>
                            </div>
                        </div>
                        <div class="row form-row">
                            <div class="col-6 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.numberofd') }}</label>
                                    <input type="text" class="form-control" id="numdays" name="number_day"
                                        value="{{ old('number_day') }}" required readonly>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.recodate') }}<span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date_reprise_conge"
                                        value="{{ old('date_reprise_conge') ?? date('Y-m-d') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row form-row">
                            <div class="col-6 col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.pattern') }}</label>
                                    <textarea type="text" rows="4" class="form-control" name="motif_conge">
                                        {{ old('motif_conge') }}
                                    </textarea>
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
@push('add_demande_conge')
    <script>
        $('#prestataire').on('keyup', function() {
            // the text typed in the input field is assigned to a variable
            var query2 = $(this).val();
            // call to an ajax function
            if (query2 == '') {
                $('#prestataire_list').html("");
                $('#prestataire_id').val("");
            } else {
                $.ajax({
                    // assign a controller function to perform search action - route name is search
                    url: "{{ route('searchPrestataireConges') }}",
                    // since we are getting data methos is assigned as GET
                    type: "GET",
                    // data are sent the server
                    data: {
                        'prestataire': query2
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

        $(document).on('click', 'li.prestataire_li', function() {
            //declare the value in the input field to a variable
            var value = $(this).text();
            //assign the value to the search box
            $('#prestataire_id').val($(this).attr('data-id'))
            var query1 = $('#prestataire_id').val();
            $('#prestataire').val(value);
            //after click is done, search results segment is made empty
            $('#prestataire_list').html("");
            //fetch_order_data(query1);
        });
    </script>
@endpush
