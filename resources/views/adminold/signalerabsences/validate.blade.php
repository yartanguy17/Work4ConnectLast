@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.reportab') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.menu.reportab') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.reportab') }}</a></li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <a href="{{ route('admin.signalerabsences.index') }}" class="btn btn-success" type="button"><i
                            class="mdi mdi-reply me-2"></i> {{ __('messages.form.back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12 offset-lg-12">
            @include('admin.inc.messages')
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">{{ __('messages.menu.reportab') }}</h4>
                    </div>
                </div>
                <form action="{{ route('admin.signalerabsences.validateStoreSignaler', $signalerabsences->id) }}"
                    method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row form-row">
                            <div class="col-4 col-sm-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.state') }} <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" name="is_valide" value="{{ old('is_valide') }}"
                                        required>
                                        <option value="0"
                                            @if (old('is_valide') == 0) selected="selected" @elseif($signalerabsences->is_valide == 0) selected="selected" @endif>
                                            {{ __('messages.form.pending') }}
                                        </option>
                                        <option value="1"
                                            @if (old('is_valide') == 1) selected="selected" @elseif($signalerabsences->is_valide == 1) selected="selected" @endif>
                                            {{ __('messages.form.accept') }}
                                        </option>
                                        <option value="2"
                                            @if (old('is_valide') == 2) selected="selected" @elseif($signalerabsences->is_valide == 2) selected="selected" @endif>
                                            {{ __('messages.form.reject') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4 col-sm-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.form.dateeff') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date_effet"
                                        value="{{ $signalerabsences->date_demande }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit"
                            class="btn btn-primary btn-block">{{ __('messages.form.validate') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
