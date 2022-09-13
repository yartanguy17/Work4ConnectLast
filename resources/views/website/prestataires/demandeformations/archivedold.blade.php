@extends('website.prestataires.layouts.app')

@section('title', 'Mes demandes de formation archivées')

@section('content')

    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->
            <div class="header_btm">
                <h2>Mes demandes de formation archivées</h2>
            </div>
        </div>
    </header>
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
                                    <h6>Vos demandes de formation archivées sont présentées dans le tableau ci-dessous.</h6>
                                </div>
                                @include('website.inc.messages')
                                <div class="table-cont">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date de la demande</th>
                                                <th>Type formation</th>
                                                <th>Titre formation</th>
                                                <th>Date début</th>
                                                <th>Date Fin</th>
                                                <th>Statut </th>
                                                <th>Avis </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($demandes as $demande)
                                                <tr>
                                                    <td>
                                                        <h6><a
                                                                href="#">{{ \Carbon\Carbon::parse($demande->created_at)->format('d/m/Y') }}</a>
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        {{ $demande->formation->types->title_type_for }}
                                                    </td>

                                                    <td>
                                                        {{ $demande->formation->title_formation }}
                                                    </td>

                                                    <td>
                                                        {{ \Carbon\Carbon::parse($demande->formation->date_debut)->format('d/m/Y') }}
                                                    </td>

                                                    <td>
                                                        {{ \Carbon\Carbon::parse($demande->formation->date_fin)->format('d/m/Y') }}
                                                    </td>

                                                    <td>
                                                        @if ($demande->status)
                                                            <label class="text-success">Traitée</label>
                                                        @else
                                                            <label class="text-danger">En attente</label>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($demande->is_favorable)
                                                            <label class="text-success">Favorable</label>
                                                        @else
                                                            <label class="text-danger">Non favorable</label>
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
