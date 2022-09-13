@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.jobseeker') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.menu.jobseeker') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.jobseeker') }}</a></li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    @can('Creer prestataire')
                        <a href="{{ route('admin.prestataires.create') }}" class="btn btn-primary" type="button">
                            <i class="mdi mdi-plus me-2"></i> {{ __('messages.form.newjobseeker') }}
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            @include('admin.inc.messages')
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('messages.form.listjobseeker') }}</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>{{ __('messages.form.tabname') }}</th>
                                <th>{{ __('messages.form.email') }}</th>
                                <th>{{ __('messages.form.date') }}</th>
                                <th>{{ __('messages.form.phone') }}</th>
                                <th>{{ __('messages.form.city') }}</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prestataires as $prestataire)
                                <tr>
                                    <td>{{ $prestataire->last_name }} {{ $prestataire->first_name }}</td>
                                    <td>{{ $prestataire->email }}</td>
                                    <td>{{ Carbon\Carbon::parse($prestataire->created_at)->format('d/m/Y,H:i') }}</td>
                                    <td>{{ $prestataire->phone_number }}</td>
                                    <td>{{ $prestataire->country }}</td>
                                    <td>{{ $prestataire->city }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            @can('Voir prestataire')
                                                <a href="{{ route('admin.prestataires.show', $prestataire->id) }}"><button
                                                        type="button" data-toggle="tooltip" title="" class="btn btn-info btn-sm"
                                                        data-original-title="Voir">
                                                        <i class="fa fa-eye"></i> {{ __('messages.form.show') }}
                                                    </button></a>
                                            @endcan
                                            @can('Modifier prestataire')
                                                <a href="{{ route('admin.prestataires.edit', $prestataire->id) }}"><button
                                                        type="button" data-toggle="tooltip" title=""
                                                        class="btn btn-primary btn-sm" data-original-title="Modifier">
                                                        <i class="fa fa-pen"></i> {{ __('messages.form.update') }}
                                                    </button></a>
                                            @endcan
                                            @can('Supprimer prestataire')
                                                <button type="button" onclick="deleteData({{ $prestataire->id }})"
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

@push('prestataire')
    <script>
        function deleteData(id) {
            var id = id;
            var url = '{{ route('admin.prestataires.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endpush
