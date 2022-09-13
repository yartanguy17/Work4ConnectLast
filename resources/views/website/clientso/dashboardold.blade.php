@extends('website.clients.layouts.app')

@section('title', 'Tableau de bord client')

@section('content')
    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->
            <div class="header_btm">
                <h2>Tableau de bord client</h2>
            </div>
        </div>
    </header>
    @if (Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    <main>
        <div class="job_container">
            <div class="container">
                <div class="row job_main">
                    <!---Side menu  -->
                    
                    <!---/ Side menu -->
                    <div class=" job_main_right">
                        <div class="row job_section">
                            <div class="col-sm-12">
                                <div class="jm_headings">
                                    <h4>Bonjour {{ auth()->user()->first_name }} !
                                    </h4>
                                </div>
                                <div class="dashboard_boxes row">
                                    <div class="col-md-6">
                                        <a href="{{ route('client.offers.index') }}">
                                            <div class="dashboard_box ">
                                                <i class="fas fa-paper-plane"></i>
                                                <h2><span>{{ $offers }}</span>Annonce(s) d'emploi</h2>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('client.signalerabsences.index') }}">
                                            <div class="dashboard_box ">
                                                <i class="fas fa-comments"></i>
                                                <h2><span>{{ $nbreAbsence }}</span>Nombre d'absence(s) signalée(s)</h2>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="section-divider"></div>
                                <div class="dashboard_boxes row">
                                    <div class="col-md-6">
                                        <a href="{{ route('client.contrat.pending') }}">
                                            <div class="dashboard_box ">
                                                <i class="fas fa-user-check"></i>
                                                <h2><span>{{ $contrats }}</span>Nombre de contrat(s) en cours</h2>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('client.contrat.pending') }}">
                                            <div class="dashboard_box ">
                                                <i class="fas fa-archive"></i>
                                                <h2><span>{{ $nbreExpire }}</span>Nombre de contrat(s) expiré(s)</h2>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
