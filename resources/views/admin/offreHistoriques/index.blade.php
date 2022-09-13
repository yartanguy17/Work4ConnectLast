@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.adhistory') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.menu.adhistory') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.adhistory') }}</a></li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">

                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('messages.menu.adhistory') }}</h4>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('messages.form.date') }}</th>
                                <th>{{ __('messages.form.labels') }}</th>
                                <th>{{ __('messages.form.description') }}</th>
                                <th>{{ __('messages.form.author') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0; @endphp
                            @foreach ($historicals as $item)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y,H:i') }}</td>
                                    <td class="text-success">{{ $item->titre_name ? $item->titre_name : 'N\A' }}</td>
                                    <td>{{ $item->offre_name ? $item->offre_name : 'N\A' }}</td>
                                     <td> {{ $item->users["email"] }}</td>
                                     
                                  
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
