@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.roles') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.menu.roles') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.update') }}</li>
                </ol>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            @include('admin.inc.messages')
            <div class="card">
                <div class="card-header with-border">
                    <h3 class="card-title"><i class='fa fa-key'></i> {{ __('messages.form.update') }}</h3>
                </div>

                {{ Form::model($role, ['route' => ['admin.roles.update', $role->id], 'method' => 'PUT']) }}
                <div class="card-body">
                    <div class="form-group mb-3">
                        {{ Form::label('name',trans('messages.form.labels'), ['class' => 'form-label']) }}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>

                    <h5><b>{{ __('messages.menu.permissions') }}</b></h5>
                    @foreach ($permissions as $permission)
                        {{ Form::checkbox('permissions[]', $permission->id, $role->permissions) }}
                        {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>
                    @endforeach
                    <br>
                </div>

                <div class="card-footer">
                    <button type="submit"
                        class="btn btn-primary btn-lg w-100 waves-effect waves-light">{{ __('messages.form.update') }}</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
