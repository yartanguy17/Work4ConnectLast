@extends('admin.layouts.app')

@section('title')
    {{ __('messages.form.listtrain') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title"> {{ __('messages.form.listtrain') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.form.listtrain') }}</a></li>
                </ol>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            @include('admin.inc.messages')
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('messages.form.listtrain') }}</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>{{ __('messages.form.title') }}</th>
                                <th>{{ __('messages.menu.typeoftraining') }}</th>
                                <th>{{ __('messages.form.jobseekername') }}</th>
                                <th>{{ __('messages.form.requdate') }}</th>
                                <th>{{ __('messages.form.state') }}</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demandes as $demande)
                                <tr>
                                    <td>{{ $demande->formation->title_formation }}</td>
                                    <td>{{ $demande->formation->types->title_type_for }}</td>
                                    <td>{{ $demande->user->last_name }} {{ $demande->user->first_name }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($demande->created_at)->format('d/m/Y') }}
                                    </td>
                                    <td>
                                        @if ($demande->status)
                                            <label class="text-success">{{ __('messages.form.processed') }}</label>
                                        @else
                                            <label class="text-danger">{{ __('messages.form.pending') }}</label>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            @can('Voir demande formation')
                                                <a href="{{ route('admin.demandeformations.show', $demande->id) }}"><button
                                                        type="button" data-toggle="tooltip" title="" class="btn btn-info btn-sm"
                                                        data-original-title="{{ __('messages.form.show') }}">
                                                        <i class="fa fa-eye"></i> {{ __('messages.form.show') }}
                                                    </button></a>
                                            @endcan
                                            @can('Supprimer demande formation')
                                                <button type="button" onclick="deleteData({{ $demande->id }})"
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

@push('demandeformation')
    <script>
        function deleteData(id) {
            var id = id;
            var url = '{{ route('admin.demandeformations.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endpush
