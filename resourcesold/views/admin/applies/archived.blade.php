@extends('admin.layouts.app')

@section('title')
    {{ __('messages.form.application') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.form.application') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.form.application') }}</a></li>
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
                    <h4 class="card-title">{{ __('messages.form.appListarch') }}</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>{{ __('messages.form.title') }}</th>
                                <th>{{ __('messages.form.area') }}</th>
                                <th>{{ __('messages.form.typeofjob') }}</th>
                                <th>{{ __('messages.form.typeofcontract') }}</th>
                                <th>{{ __('messages.form.customername') }}</th>
                                <th>{{ __('messages.form.jobseekername') }}</th>
                                <th>{{ __('messages.form.dateApp') }}</th>
                                <th>{{ __('messages.form.status') }}</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applies as $apply)
                                <tr>
                                    <td>{{ $apply->offer->title_offer }}</td>
                                    <td>{{ $apply->offer->secteurs->title_secteur }}</td>
                                    <td>{{ $apply->offer->types->title_job_ty }}</td>
                                    <td>{{ $apply->offer->typecontrat->title_type_con }}</td>
                                    <td>{{ $apply->offer->user->last_name }} {{ $apply->offer->user->first_name }}
                                    </td>
                                    <td>{{ $apply->user->last_name }} {{ $apply->user->first_name }}</td>
                                    <td>
                                        {{ Carbon\Carbon::parse($apply->created_at)->format('d/m/Y') }}
                                    </td>
                                    <td>
                                        @if ($apply->status)
                                            <label class="text-success">{{ __('messages.form.processed') }}</label>
                                        @else
                                            <label class="text-danger">{{ __('messages.form.pending') }}</label>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            @can('Voir candidature')
                                                <a href="{{ route('admin.applies.show', $apply->id) }}"><button type="button"
                                                        data-toggle="tooltip" title="" class="btn btn-info btn-sm"
                                                        data-original-title="{{ __('messages.form.show') }}">
                                                        <i class="fa fa-eye"></i> {{ __('messages.form.show') }}
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
@endsection
