@extends('admin.layouts.app')

@section('title')
    {{ __('messages.form.archivedrem') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.form.archivedrem') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.form.archivedrem') }}</a></li>
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
                    <h4 class="card-title">{{ __('messages.form.archivedrem') }}</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>{{ __('messages.form.rdate') }}</th>
                                <th>{{ __('messages.form.rschedule') }}</th>
                                <th>{{ __('messages.form.phone') }}</th>
                                <th>{{ __('messages.form.state') }}</th>
                                <th>{{ __('messages.form.requdate') }}</th>
                                <th>{{ __('messages.form.remark') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($archived as $item)
                                <tr>
                                    <td>{{ Carbon\Carbon::parse($item->date_rapel)->format('d/m/Y') }}</td>
                                    <td>{{ $item->horaire_rapel }}</td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>
                                        @if ($item->status)
                                            <label class="text-success">{{ __('messages.form.processed') }}</label>
                                        @else
                                            <label class="text-danger">{{ __('messages.form.pending') }}</label>
                                        @endif
                                    </td>
                                    <td>{{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                    <td>{{ $item->comment_rappel ? $item->comment_rappel : 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
