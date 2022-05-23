@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.emp') }}
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">{{ __('messages.menu.emp') }}</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.form.detail') }}</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <a href="{{ route('admin.contrats.create') }}" class="btn btn-primary" type="button">
                        <i class="mdi mdi-plus me-2"></i> {{ __('messages.form.newcontrat') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-sm-12">
            @include('admin.inc.messages')
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="invoice-title">
                                <h4 class="float-end font-size-16"><strong>Contrat #{{ $contrat->id }}</strong></h4>
                                <h3 class="mt-0">
                                    <img src="{{ asset('assets/front/images/resources/logo.png') }}"
                                        alt="Work4connect" height="24">
                                </h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 p-2">
                                    <div class="p-0">
                                        <h3 class="font-size-16"><strong>ENTRE LES SOUSSIGNES :</strong></h3>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <address>
                                        <strong>Le Prestataire :</strong><br>
                                        {{ $contrat->prestataire['last_name'] }}
                                        {{ $contrat->prestataire['first_name'] }}<br>
                                        {{ $contrat->prestataire['phone_number'] }} <br>
                                        {{ $contrat->prestataire['email'] }}<br>
                                        {{ $contrat->prestataire['address'] }}
                                    </address>
                                    <div class="p-0">
                                        <h3 class="font-size-16"><strong>D'UNE PART,</strong></h3>
                                    </div>
                                </div>
                                <div class="col-2 text-center">
                                    <div class="p-4">
                                        <h3 class="font-size-16"><strong>ET</strong></h3>
                                    </div>
                                </div>
                                <div class="col-5 text-end">
                                    <address>
                                        <strong>Le Client :</strong><br>
                                        {{ $contrat->client['last_name'] }} {{ $contrat->client['first_name'] }}<br>
                                        {{ $contrat->client['phone_number'] }} <br>
                                        {{ $contrat->client['email'] }}<br>
                                        {{ $contrat->client['address'] }}
                                    </address>
                                    <div class="p-0">
                                        <h3 class="font-size-16"><strong>D'AUTRE PART,</strong></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-2">
                            <div>
                                <div class="p-2">
                                    <h3 class="font-size-16"><strong>IL A ETE CONVENU CE QUI SUIT:</strong></h3>
                                </div>
                                <div class="">
                                    <div class=" p-2">
                                        <h3 class="font-size-16"></h3>
                                        <p>
                                        </p>
                                    </div>

                                    @if ($contrat->date_fin != '')
                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong> DUREE </strong></h3>
                                            <p>Le présent contrat prend effet le
                                                {{ \Carbon\Carbon::parse($contrat->date_effet)->format('d/m/Y') }} et
                                                prendra fin de plein droit
                                                et sans formalité le
                                                {{ \Carbon\Carbon::parse($contrat->date_fin)->format('d/m/Y') }}
                                            </p>
                                        </div>
                                    @else
                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong> DUREE </strong></h3>
                                            <p>Le présent contrat prend effet le
                                                {{ \Carbon\Carbon::parse($contrat->date_effet)->format('d/m/Y') }} pour
                                                une durée indeterminée
                                            </p>
                                        </div>
                                    @endif
                                    <div class="p-2">
                                        <h3 class="font-size-16"><strong>LIEU DE TRAVAIL</strong></h3>
                                        <p>
                                            Le lieu de travail est situé à {{ $contrat->villes['title_ville'] }}
                                        </p>
                                    </div>


                                    <div class="p-2">
                                        <h3 class="font-size-16"><strong>DUREE DU TRAVAIL </strong></h3>
                                        <p>
                                            Les horaires seront les suivants:
                                        </p>
                                        <p>
                                            {!! $contrat->working_description !!}
                                        </p>
                                    </div>


                                    <div class="p-2">

                                    </div>

                                    <div class="p-4">
                                        <p></p>
                                    </div>
                                </div>
                                <div class="d-print-none">
                                    <div class="float-end">
                                        <a href="{{ route('admin.contrat.pdf', $contrat->id) }}"
                                            class="btn btn-success waves-effect waves-light"><i
                                                class="fa fa-print"></i></a>
                                        <a class="btn btn-primary" href="{{ route('admin.contrats.index') }}"><i
                                                class="fas fa-long-arrow-alt-left"></i>
                                            {{ __('messages.form.back') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div>
        </div>
    @endsection
