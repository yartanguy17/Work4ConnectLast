@extends('admin.layouts.app')

@section('title')
    {{ __('messages.form.activeser') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.form.activeser') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.form.activeser') }}</a></li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <a href="{{ route('admin.offers.create') }}" class="btn btn-primary" type="button">
                        <i class="mdi mdi-plus me-2"></i> {{ __('messages.form.newannounce') }}
                    </a>
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
                    <h4 class="card-title">{{ __('messages.form.activeser') }}</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>{{ __('messages.form.dateCreat') }}</th>
                                <th>{{ __('messages.form.author') }}</th>
                                <th>{{ __('messages.form.title') }}</th>
                                 
                                <th>{{ __('messages.form.opinion') }}</th>
                                <th>{{ __('messages.form.status') }}</th>
                                <th>{{ __('messages.form.datebegin') }}</th>
                                <th>{{ __('messages.form.deadline') }}</th>
                                <th>{{ __('messages.form.datefin') }}</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offers as $offer)
                                <tr>
                                    <td>
                                        {{ \Carbon\Carbon::parse($offer->created_at)->format('d/m/Y , H:i') }}
                                    </td>
                                    <td>{{ $offer->user["email"] }} | {{ $offer->user["first_name"] }}</td>
                                     <td>{{ $offer->title_offer }}</td>
                                    <td>
                                        @if ($offer->status)
                                            <span class="text-success">{{ __('messages.form.published') }}</span>
                                        @else
                                            <span class="text-danger">{{ __('messages.form.pending') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($offer->is_active)
                                            <span class="text-success">{{ __('messages.form.active') }}</span>
                                        @else
                                            <span class="text-danger">{{ __('messages.form.inactive') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($offer->start_date)->format('d/m/Y') }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($offer->end_date_delai)->format('d/m/Y') }}
                                    </td>
                                    <td>
                                        {{ $offer->end_date ? Carbon\Carbon::parse($offer->end_date)->format('d/m/Y') : 'N/A' }}
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            @can('Voir annonce')
                                                <a href="{{ route('admin.offers.show', $offer->id) }}"><button type="button"
                                                        data-toggle="tooltip" title="" class="btn btn-info btn-sm"
                                                        data-original-title="Voir">
                                                        <i class="fa fa-eye"></i> {{ __('messages.form.show') }}
                                                    </button></a>
                                            @endcan
                                            @can('Modifier annonce')
                                                <a href="{{ route('admin.offers.edit', $offer->id) }}"><button type="button"
                                                        data-toggle="tooltip" title="" class="btn btn-primary btn-sm"
                                                        data-original-title="Modifier">
                                                        <i class="fa fa-pen"></i> {{ __('messages.form.update') }}
                                                    </button></a>
                                            @endcan
                                            <a href="{{ route('admin.offers.treatApply', $offer->id) }}"><button
                                                    type="button" data-toggle="tooltip" title=""
                                                    class="btn btn-success btn-sm" data-original-title="Postuler">
                                                    <i class="fa fa-square-o"></i> {{ __('messages.form.apply') }}
                                                </button></a>
                                            @can('Supprimer annonce')
                                                <button type="button" onclick="deleteData({{ $offer->id }})"
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

@push('offer')
    <script>
        function deleteData(id) {
            var id = id;
            var url = '{{ route('admin.offers.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endpush
