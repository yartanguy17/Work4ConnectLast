@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.user') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.form.admList') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.form.admList') }}</a></li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    @can('Creer utilisateur')
                        <a href="{{ route('admin.admins.create') }}" class="btn btn-primary" type="button">
                            <i class="mdi mdi-plus me-2"></i> {{ __('messages.form.newuser') }}
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
                    <h4 class="card-title">{{ __('messages.form.admList') }}</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>{{ __('messages.form.tabname') }}</th>
                                <th>{{ __('messages.form.email') }}</th>
                                <th>{{ __('messages.form.date') }}</th>
                                <th>{{ __('messages.form.roles') }}</th>
                                <th>{{ __('messages.form.phone') }}</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->last_name }} {{ $user->first_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('d/m/Y,H:i') }}</td>
                                    <td>
                                        {{ $user->roles()->pluck('name')->implode(' ') }}
                                    </td>
                                    <td>{{ $user->phone_number }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            @can('Modifier utilisateur')
                                                <a href="{{ route('admin.admins.edit', $user->id) }}"><button type="button"
                                                        data-toggle="tooltip" title="" class="btn btn-primary btn-sm"
                                                        data-original-title="Modifier">
                                                        <i class="fa fa-pen"></i> {{ __('messages.form.update') }}
                                                    </button></a>
                                            @endcan
                                            @can('Supprimer utilisateur')
                                                <button type="button" onclick="deleteData({{ $user->id }})"
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

@push('admin')
    <script>
        function deleteData(id) {
            var id = id;
            var url = '{{ route('admin.admins.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endpush
