@extends('website.prestataires.layouts.app')

@section('title', 'Tableau de bord prestataire')

@section('content')
    <!-- Header ================================================== -->
    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->
            <div class="header_btm">
                <h2>Tableau de bord prestataire</h2>
            </div>
        </div>
    </header>
    <!-- Main ================================================== -->
    <main>
        <div class="job_container">
            <div class="container">
                <div class="row job_main">
                    <!---Side menu  -->
                    @include('website.prestataires.partials.side_menu')
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
                                        <a href="{{ route('prestataire.demandeabsences.index') }}">
                                            <div class="dashboard_box ">

                                                <i class="fas fa-paper-plane"></i>
                                                <h2><span>{{ $nbreAbsence }}</span>Nombre de jours d'absence</h2>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('prestataire.demandeconges.index') }}">
                                            <div class="dashboard_box">
                                                <i class="fas fa-user-check"></i>
                                                <h2><span>{{ $nbreConge }}</span>Nombre de jours de congés </h2>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="section-divider"></div>
                                <div class="dashboard_boxes row">
                                    <div class="col-md-6">
                                        <a href="{{ route('prestataire.contrat.pending') }}">
                                            <div class="dashboard_box ">
                                                <i class="fas fa-user"></i>
                                                <h2><span>{{ $nbreContratEnCours }}</span>Nombre de contrat(s) en cours
                                                </h2>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('prestataire.contrat.archived') }}">
                                            <div class="dashboard_box ">
                                                <i class="fas fa-archive"></i>
                                                <h2><span>{{ $nbreContratExpire }}</span>Nombre de contrat(s) expiré(s)
                                                </h2>
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
