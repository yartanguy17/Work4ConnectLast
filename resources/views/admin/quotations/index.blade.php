@extends('admin.layouts.app')

@section('title', 'Être rappelé')

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Requêtes en attente</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Tableau de bord</a></li>
                    <li class="breadcrumb-item"><a href="#">Requêtes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Liste</li>
                </ol>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            @include('admin.inc.messages')
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Liste des requêtes en attente</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Date requête</th>
                                <th>Téléphone</th>
                                <th>Date du rappel</th>
                                <th>Plage horaire</th>
                                <th>Traité</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quotations as $i => $quotation)
                                <tr>
                                    <td>
                                        {{ \Carbon\Carbon::parse($quotation->created_at)->format('d/m/Y') }}
                                    </td>
                                    <td>{{ $quotation->phone_number }}</td>
                                    <td>{{ \Carbon\Carbon::parse($quotation->quotation_date)->format('d/m/Y') }}</td>
                                    <td>{{ $quotation->range ? $quotation->range : 'N/A' }}</td>
                                    <td>
                                        <input class="form-check form-switch check" data-id="{{ $quotation->id }}"
                                            type="checkbox" id="switch{{ $i }}"
                                            {{ $quotation->status ? 'checked' : '' }} switch="none">
                                        <label class="form-label" for="switch{{ $i }}" data-on-label="Oui"
                                            data-off-label="Non"></label>
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            @can('Voir quotation')
                                                <a href="{{ route('admin.quotations.show', $quotation->id) }}"><button
                                                        type="button" data-toggle="tooltip" title="" class="btn btn-info btn-sm"
                                                        data-original-title="Voir">
                                                        <i class="fa fa-eye"></i> Voir
                                                    </button></a>
                                            @endcan
                                            @can('Supprimer quotation')
                                                <button type="button" onclick="deleteData({{ $quotation->id }})"
                                                    class="btn btn-danger btn-sm waves-effect waves-light"
                                                    data-bs-toggle="modal" data-bs-target="#confirm">
                                                    <i class="fa fa-trash"></i> Supprimer
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
                        <h5 class="modal-title mt-0">Comfirmation de suppression</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('DELETE')
                        <p>Etes-vous sûr de vouloir supprimer cette requête?</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-danger">
                            Supprimer</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@push('quotation')
    <script>
        $('.check').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var quotation_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{!! URL::route('change_quotation_status') !!}',
                data: {
                    'status': status,
                    'quotation_id': quotation_id
                },
                success: function(data) {
                    location.reload(true);
                    console.log(data.success)
                }
            });
        })

        function deleteData(id) {
            var id = id;
            var url = '{{ route('admin.quotations.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endpush
