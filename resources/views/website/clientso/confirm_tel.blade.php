@extends('website.clients.layouts.app')

@section('title', 'Confirmation de numéro de téléphone')

@section('content')
    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->
            <div class="header_btm">
                <h2>Confirmation de numéro de téléphone</h2>
            </div>
        </div>
    </header>
    <main>
        <div class="job_container">
            <div class="container">
                <div class="row job_main">
                    <!---Side menu  -->
                    @include('website.clients.partials.side_menu')
                    <!---/ Side menu -->
                    <div class=" job_main_right">
                        <div class="row job_section">
                            <div class="col-sm-12">
                                <div class="jm_headings">
                                    <h5>Confirmation de numéro de téléphone</h5>
                                </div>
                                <div class="section-divider"></div>
                                @include('website.inc.messages')
                                <form action="{{ route('client.post_confirm_tel') }}" method="POST">
                                    @csrf

                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label>{{ __('welcome.form.phone') }}<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input id="output" type="hidden" name="phone_number" value="" />
                                            <input type="tel" id="phone" name="" class="form-control"
                                                value="{{ old('phone_number') }}" autocomplete="phone_number" size="40">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label>Confirmation Téléphone<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input id="confirm_output" type="hidden" name="confirm_phone_number" value="" />
                                            <input type="tel" id="confirm_phone" name="" class="form-control"
                                                value="{{ old('confirm_phone_number') }}"
                                                autocomplete="confirm_phone_number">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-9 offset-md-3">
                                            <button type="submit" class="btn btn-primary">{{ __('welcome.form.add') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
