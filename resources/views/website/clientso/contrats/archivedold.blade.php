@extends('website.clients.layouts.app')

@section('title', 'Mes contrats archivés')

@section('content')
    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->
            <div class="header_btm">
                <h2>Mes contrats archivés</h2>
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
                                    <h6>Vos contrats archivés sont présentés dans le tableau ci-dessous.</h6>
                                </div>
                                @include('website.inc.messages')
                                <div class="table-cont">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date du contrat</th>
                                                <th>Type contrat</th>
                                                <th>Nom Prestataire</th>
                                                <th>Date effet</th>
                                                <th>Date Fin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contrats as $contrat)
                                                <tr>
                                                    <td>
                                                        <h6><a
                                                                href="#">{{ \Carbon\Carbon::parse($contrat->created_at)->format('d/m/Y') }}</a>
                                                        </h6>
                                                        <ul class="job-dashboard-actions">
                                                            <li>
                                                                <a href="{{ route('contrat.show', Crypt::encrypt($contrat->id)) }}"
                                                                    class="job-dashboard-action-mark_filled">
                                                                    Voir</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('contratclient.pdf', $contrat->id) }}"
                                                                    class="job-dashboard-action-mark_filled">
                                                                    Imprimer</a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        {{ $contrat->type->title_type_con }}
                                                    </td>
                                                    <td>
                                                        {{ $contrat->prestataire->last_name }}
                                                        {{ $contrat->prestataire->first_name }}
                                                    </td>
                                                    <td>
                                                        {{ Carbon\Carbon::parse($contrat->date_effet)->format('d/m/Y') }}
                                                    </td>
                                                    <td>
                                                        {{ $contrat->date_fin ? Carbon\Carbon::parse($contrat->date_fin)->format('d/m/Y') : 'N/A' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
