@extends('admin.layouts.app')

@section('title')
    {{ __('messages.form.invoice') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.form.invoice') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.form.billpayment') }}</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            @include('admin.inc.messages')
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('messages.form.listinvoice') }}</h4>
                    <form action="{{ route('affiche') }}" method="GET" class="form-inline">
                        <hr>
                        <table class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>{{ __('messages.form.reference') }}</th>
                                    <th>{{ __('messages.form.amount') }}</th>
                                    <th>{{ __('messages.form.customername') }}</th>
                                    <th>{{ __('messages.form.dateinvoice') }}</th>
                                    <th>{{ __('messages.form.typeofjobseeker') }}</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($factures as $item)
                                    <tr>

                                        @php
                                            $client = DB::table('users')
                                                ->where('id', $item->client_id)
                                                ->get();
                                        @endphp
                                        <td>
                                            {{ $item->reference }}
                                        </td>

                                        <td>
                                            {{ $item->amount }}
                                        </td>

                                        <td>
                                            @foreach ($client as $data)
                                                {{ $data->last_name }} {{ $data->first_name }}
                                            @endforeach
                                        </td>

                                        <td>
                                            {{ $item->date_facture }}
                                        </td>


                                        <td>
                                            @if ($item->type_contrat === 'MER')
                                                <span>{{ __('messages.form.linking') }}<span>
                                                    @elseif($item->type_contrat === 'SAL')
                                                        <span>{{ __('messages.form.employee') }}<span>
                                                            @elseif($item->type_contrat === 'MDP')
                                                                <span>{{ __('messages.form.provision') }}<span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="form-button-action">
                                                @can('Imprimer facture')
                                                    <a href="{{ route('printer', $item->id) }}"><button type="button"
                                                            data-toggle="tooltip" title="" class="btn btn-info btn-sm"
                                                            data-original-title="Facture">
                                                            <i class="fas fa-eye"></i> {{ __('messages.form.invoice') }}
                                                        </button></a>
                                                @endcan
                                                @can('Imprimer facture')
                                                    <a href="{{ route('paiement', $item->id) }}">
                                                        <button type="button" data-toggle="tooltip" title=""
                                                            class="btn btn-info btn-sm" data-original-title="Facture">
                                                            <i class="fas fa-print"></i> {{ __('messages.form.pay') }}
                                                        </button>
                                                    </a>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@push('add_absence')
    <script>
        $('#client').on('keyup', function() {
            // the text typed in the input field is assigned to a variable
            var query2 = $(this).val();
            // call to an ajax function
            if (query2 == '') {
                $('#client_list').html("");
                $('#client_id').val("");
            } else {
                $.ajax({
                    // assign a controller function to perform search action - route name is search
                    url: "{{ route('searchClient') }}",
                    // since we are getting data methos is assigned as GET
                    type: "GET",
                    // data are sent the server
                    data: {
                        'client': query2
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

        $(document).on('click', 'li.client_li', function() {
            //declare the value in the input field to a variable
            var value = $(this).text();
            //assign the value to the search box
            $('#client_id').val($(this).attr('data-id'))
            var query1 = $('#client_id').val();
            $('#client').val(value);
            //after click is done, search results segment is made empty
            $('#client_list').html("");
            //fetch_order_data(query1);
        });
    </script>
@endpush
