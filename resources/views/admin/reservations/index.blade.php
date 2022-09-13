@extends('admin.layouts.app')

@section('title')
    {{ __('messages.form.pendarchiv') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title"> {{ __('messages.form.pendarchiv') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="#"> {{ __('messages.form.pendarchiv') }}</a></li>
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
                    <h4 class="card-title">{{ __('messages.form.listpendarchiv') }}</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>{{ __('messages.form.customername') }}</th>
                                <th>{{ __('messages.form.jobseekername') }}</th>
                                <th>{{ __('messages.form.dateres') }}</th>
                                <th>{{ __('messages.form.status') }}</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $i => $reservation)
                                <tr>
                                    <td>{{ $reservation->clients->last_name }} {{ $reservation->clients->first_name }}
                                    </td>
                                    <td>{{ $reservation->prestataires->last_name }}
                                        {{ $reservation->prestataires->first_name }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y') }}
                                    </td>
                                    <td>
                                        @if ($reservation->status)
                                            {{ __('messages.form.processed') }}
                                        @else
                                            {{ __('messages.form.pending') }}
                                        @endif
                                        <input class="form-check form-switch check" data-id="{{ $reservation->id }}"
                                            type="checkbox" id="switch{{ $i }}"
                                            {{ $reservation->status ? 'checked' : '' }} switch="none">
                                        <label class="form-label" for="switch{{ $i }}" data-on-label="Oui"
                                            data-off-label="Non"></label>
                                    </td>

                                    <td>
                                        <div class="form-button-action">
                                            @can('Voir reservation')
                                                <a href="{{ route('admin.reservations.show', $reservation->id) }}"><button
                                                        type="button" data-toggle="tooltip" title="" class="btn btn-info btn-sm"
                                                        data-original-title="Voir">
                                                        <i class="fa fa-eye"></i> {{ __('messages.form.show') }}
                                                    </button></a>
                                            @endcan
                                            @can('Supprimer reservation')
                                                <button type="button" onclick="deleteData({{ $reservation->id }})"
                                                    class="btn btn-danger btn-sm waves-effect waves-light"
                                                    data-bs-toggle="modal" data-bs-target="#confirm">
                                                    <i class="fa fa-trash"></i> {{ __('messages.form.delete') }}
                                                </button>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


    <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        id="confirm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="" id="deleteForm" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0">{{ __('messages.form.confirmDelete') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('DELETE')
                        <p>{{ __('messages.form.messager') }}</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('messages.form.close') }}</button>
                        <button type="submit" class="btn btn-danger">
                            {{ __('messages.form.delete') }}</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@push('reservation')
    <script>
        $('.check').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var reservation_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{!! URL::route('change_reservation_status') !!}',
                data: {
                    'status': status,
                    'reservation_id': reservation_id
                },
                success: function(data) {
                    location.reload(true);
                    console.log(data.success)
                }
            });
        })

        function deleteData(id) {
            var id = id;
            var url = '{{ route('admin.reservations.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endpush
