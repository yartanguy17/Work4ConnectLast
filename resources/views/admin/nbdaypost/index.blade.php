@extends('admin.layouts.app')

@section('title')
    {{ __('messages.form.listNombr') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div id="request-message" style="display: none" class="alert alert-success"></div>
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title"> {{ __('messages.form.listNombr') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="#"> {{ __('messages.form.listNombr') }}</a></li>
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
                    <h4 class="card-title"> {{ __('messages.form.listNombr') }}</h4>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> {{ __('messages.form.listNombr') }}</th>
                                <th width="300px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nbpostes as $nbpost)
                                <tr>
                                    <td>{{ $nbpost->id }}</td>
                                    <td>{{ $nbpost->nb_day_post }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm edit" type="button" data-bs-toggle="modal"
                                            data-bs-target="#confirm" data-original-title="Modifier"
                                            data-nbdate="{{ $nbpost->nb_day_post }}" data-id="{{ $nbpost->id }}">
                                            <i class="fa fa-pen"></i> {{ __('messages.form.update') }}
                                        </button>
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
                        <h5 class="modal-title mt-0">{{ __('messages.form.listMise') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="modelemail"> {{ __('messages.form.numberofd') }}</label>
                            <input type="text" class="form-control" name="date" id="date" placeholder="Nom">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('messages.form.close') }}</button>
                        <button type="button" id="form-handler" class="btn btn-primary">
                            Valider</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@push('typecong')
    <script>
        $(document).ready(function() {
            const requestMessage = $('#request-message')
            let state = null;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.edit').each(function() {
                $(this).click(function() {
                    var dateold = $(this).data("nbdate")

                    var id = $(this).data("id")

                    $('#date').val(dateold)
                    $('#id').val(id)
                })
            })

            $('#form-handler').click(function() {

                var inputdate = $('#date').val()
                var id = $('#id').val()

                $.ajax({

                    type: "POST",
                    url: "{{ url('admin/nombre-jours-offer') }}",
                    data: {
                        id: id,
                        date: inputdate
                    },
                    dataType: 'json',

                    success: function(res) {

                        if (res.status) {

                            setTimeout(() => {
                                window.location.reload();
                            }, 3000);

                            requestMessage.addClass('alert-success').removeClass(
                                'alert-danger');
                            requestMessage.text(res.message).show();
                        } else {
                            window.location.reload();
                            requestMessage.addClass('alert-danger').removeClass(
                                'alert-success');
                            requestMessage.text(res.error).show();
                        }
                    }
                })
            })
        })
    </script>
@endpush
