@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.posts') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.menu.posts') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.posts') }}</a></li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    @can('Creer post')
                        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary" type="button">
                            <i class="mdi mdi-plus me-2"></i> {{ __('messages.form.newpost') }}
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
                    <h4 class="card-title">{{ __('messages.form.listpost') }}</h4>
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <!-- Simple card -->
                                <div class="card">
                                    @if ($post->cover_image == null)
                                        <img class="card-img-top img-fluid" src="{{ asset('images/blog.jpg') }}"
                                            alt="Card image cap">
                                    @else
                                        <img alt="Card image cap"
                                            src="{{ asset('assets/attachments/' . $post->cover_image) }}"
                                            class="card-img-top img-fluid" style="height: 10%;width:10%">
                                    @endif
                                    <div class="card-body">
                                        <h4 class="card-title  mt-0">{{ $post->title_post }}</h4>
                                        <p class="card-text">{!! \Illuminate\Support\Str::limit($post->body_post, 50, '...') !!}</p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row pt-3">
                                            <div class="col">
                                                @can('Modifier post')
                                                    <a href="{{ URL::to('admin/posts/' . $post->id . '/edit') }}"
                                                        class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                                                        {{ __('messages.form.update') }}</a>
                                                @endcan
                                            </div>

                                            <div class="col text-right">
                                                @can('Supprimer post')
                                                    <button type="button" onclick="deleteData({{ $post->id }})"
                                                        class="btn btn-danger btn-sm waves-effect waves-light"
                                                        data-bs-toggle="modal" data-bs-target="#confirm">
                                                        <i class="fa fa-trash"></i> {{ __('messages.form.delete') }}
                                                    </button>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
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

@push('post')
    <script>
        function deleteData(id) {
            var id = id;
            var url = '{{ route('admin.posts.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endpush
