@extends('website.clients.layouts.app')

@section('title', 'Mes factures')

@section('content')
    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->
            <div class="header_btm">
                <h2>Mes factures</h2>
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
                                    <h6>Vos factures en cours sont présentés dans le tableau ci-dessous.</h6>
                                </div>
                                @include('website.inc.messages')
                                <div class="table-cont">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date de la facture</th>
                                                <th>Montant</th>
                                                <th>Reference</th>
                                                <th>Statut </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($factures as $facture)
                                                <tr>
                                                    <td>
                                                        <h6><a
                                                                href="#">{{ \Carbon\Carbon::parse($facture->date_facture)->format('d/m/Y') }}</a>
                                                        </h6>
                                                        <ul class="job-dashboard-actions">
                                                            @if ($facture->status == false)
                                                                <li>
                                                                    <a href="{{ route('paiementfacture', $facture->id) }}"
                                                                        class="job-dashboard-action-mark_filled">
                                                                        Payer</a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        {{ $facture->amount }} F CFA
                                                    </td>
                                                    <td>
                                                        {{ $facture->reference }}
                                                    </td>
                                                    <td>
                                                        @if ($facture->status == true)
                                                            <label class="text-success">Facture payée</label>
                                                        @else
                                                            <label class="text-danger">Facture non payée</label>
                                                        @endif
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
