@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.absencerequ') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title"> {{ __('messages.menu.absencerequ') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="#"> {{ __('messages.menu.absencerequ') }}</a></li>
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
                    <h4 class="card-title">{{ __('messages.form.listabs') }}</h4>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('messages.form.names') }} & {{ __('messages.form.firstname') }}</th>
                                <th>{{ __('messages.form.requdate') }}</th>
                                <th>{{ __('messages.form.startdate') }}</th>
                                <th>{{ __('messages.menu.typeabs') }} </th>
                                <th>{{ __('messages.form.pattern') }}</th>
                                <th>{{ __('messages.form.recodate') }}</th>
                                <th>{{ __('messages.form.numberofd') }}</th>
                                <th>{{ __('messages.form.remark') }}</th>
                                <th>{{ __('messages.form.state') }}</th>
                                <th>{{ __('messages.form.dateeff') }}</th>
                                <th width="300px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0; @endphp
                            @foreach ($demandeabsences as $demande)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $demande->users->last_name }} {{ $demande->users->first_name }}
                                    </td>
                                    <td>{{ $demande->date_demande ? date('d/m/Y', strtotime($demande->date_demande)) : 'N/A' }}
                                    </td>
                                    <td>{{ $demande->date_effet ? date('d/m/Y', strtotime($demande->date_effet)) : 'N/A' }}
                                    </td>
                                    <td>{{ $demande->typedemandes->type_absence_name }}</td>
                                    <td>{{ $demande->motif_demande }}</td>
                                    <td>{{ $demande->date_reprise ? date('d/m/Y', strtotime($demande->date_reprise)) : 'N/A' }}
                                    </td>
                                    <td>{{ $demande->dure_absence }}</td>
                                    <td>{{ $demande->comment_demande ? $demande->comment_demande : 'N/A' }}
                                    </td>
                                    <td>
                                        @if ($demande->is_valide == 0)
                                            <label class="text-danger">{{ __('messages.form.pending') }}</label>
                                        @elseif($demande->is_valide == 1)
                                            <label class="text-success">{{ __('messages.form.accept') }}</label>
                                        @elseif($demande->is_valide == 2)
                                            <label class="text-danger">{{ __('messages.form.reject') }}</label>
                                        @endif
                                    </td>
                                    <td>{{ $demande->date_effet ? date('d/m/Y', strtotime($demande->date_effet)) : 'N/A' }}
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            @can('Voir demande absence')
                                                <a href="{{ route('admin.demandeabsences.show', $demande->id) }}"><button
                                                        type="button" data-toggle="tooltip" title="" class="btn btn-info btn-sm"
                                                        data-original-title="Voir">
                                                        <i class="fa fa-eye"></i> {{ __('messages.form.show') }}
                                                    </button></a>
                                            @endcan
                                            @can('Supprimer demande absence')
                                                <button type="button" onclick="deleteData({{ $demande->id }})"
                                                    class="btn btn-danger btn-sm waves-effect waves-light"
                                                    data-bs-toggle="modal" data-bs-target="#confirm">
                                                    <i class="fa fa-trash"></i> {{ __('messages.form.delete') }}
                                                </button>
                                            @endcan
                                            @can('Valider demande absence')
                                                <a href="{{ route('admin.demandeabsences.updateValidate', $demande->id) }}"><button
                                                        type="button" data-toggle="tooltip" title=""
                                                        class="btn btn-success btn-sm"
                                                        data-original-title="{{ __('messages.form.validate') }}">
                                                        <i class="fa fa-check"></i> {{ __('messages.form.validate') }}
                                                    </button></a>
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
@push('demande')
    <script>
        function deleteData(id) {
            var id = id;
            var url = '{{ route('admin.demandeabsences.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endpush
