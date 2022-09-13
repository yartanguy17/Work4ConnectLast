@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.user') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title"> {{ __('messages.menu.user') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.update') }}</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <a href="{{ route('admin.admins.index') }}" class="btn btn-primary" type="button">
                        <i class="mdi mdi-reply me-2"></i> {{ __('messages.form.back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-md-12">
            @include('admin.inc.messages')
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">{{ __('messages.form.update') }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    {{ Form::model($user, ['route' => ['admin.admins.update', $user->id],'method' => 'PUT','enctype' => 'multipart/form-data']) }}{{-- Form model binding to automatically populate our fields with user data --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                {{ Form::label('last_name', trans('messages.form.last_name'), ['class' => 'form-label']) }}
                                {{ Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                {{ Form::label('first_name', trans('messages.form.first_name'), ['class' => 'form-label']) }}
                                {{ Form::text('first_name', null, ['class' => 'form-control', 'id' => 'first_name']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                {{ Form::label('email', 'Email', ['class' => 'form-label']) }}
                                {{ Form::email('email', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group mb-3">
                                <label class="form-label">{{ __('messages.form.phone') }}<span
                                        class="text-danger">*</span></label>
                                <input id="output" type="hidden" name="phone_number" value="" />
                                <input type="tel" id="phone" name="" class="form-control"
                                    value="{{ $user->phone_number }}" size="40">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                {{ Form::label('password', trans('messages.form.password'), ['class' => 'form-label']) }}<br>
                                {{ Form::password('password', ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                {{ Form::label('password', trans('messages.form.passwordconfir'), ['class' => 'form-label']) }}<br>
                                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group mb-3">
                                {{ Form::label('address', trans('messages.form.address'), ['class' => 'form-label']) }}
                                {{ Form::text('address', null, ['class' => 'form-control', 'id' => 'address']) }}
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                {{ Form::label('profile_picture', trans('messages.form.picture'), ['class' => 'form-label']) }}
                                {{ Form::file('profile_picture', ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <h5><b>{{ __('messages.form.roles') }}</b></h5>
                            <div class='form-group mb-3'>
                                @foreach ($roles as $role)
                                    {{ Form::checkbox('roles[]', $role->id) }}
                                    {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                                @endforeach
                            </div>
                        </div>
                    </div>
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
