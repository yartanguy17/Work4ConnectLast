@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.faqscateg') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.menu.faqscateg') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.form.newfaqscateg') }}</a></li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    @can('Creer categorie FAQ')
                        <a href="{{ route('admin.faqcategories.create') }}" class="btn btn-primary" type="button">
                            <i class="mdi mdi-plus me-2"></i> {{ __('messages.form.newfaqscateg') }}
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
                    <h4 class="card-title">{{ __('messages.form.listfaqcat') }}</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('messages.menu.category') }}</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0; @endphp
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>
                                        <h6 class="table-avatar">
                                            <a href="#">{{ $category->title_faq_cat }}</a>
                                        </h6>
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            @can('Modifier categorie FAQ')
                                                <a href="{{ route('admin.faqcategories.edit', $category->id) }}"><button
                                                        type="button" data-toggle="tooltip" title=""
                                                        class="btn btn-primary btn-sm" data-original-title="Modifier">
                                                        <i class="fa fa-pen"></i> {{ __('messages.form.update') }}
                                                    </button></a>
                                            @endcan
                                            @can('Supprimer categorie FAQ')
                                                <button type="button" onclick="deleteData({{ $category->id }})"
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


@push('faqcategory')
    <script>
        function deleteData(id) {
            var id = id;
            var url = '{{ route('admin.faqcategories.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endpush
