<!DOCTYPE html>
<html lang="en">


<!-- account 07:01:11 GMT -->
@include('website.partials.header')

<body>
    <div class="boxed_wrapper">

        <div class="preloader"></div>

        @include('website.partials.menu')
        <!--End Main Header-->

        @extends('website.clients.layouts.app')

        @section('title', 'Valider demande absence')

        @section('content')
            <header class="header_01 header_inner">
                <div class="header_main">
                    <!-- Header -->
                    @include('website.partials.header')
                    <!--/ Header -->
                    <div class="header_btm">
                        <h2>Valider demande absence</h2>
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
                                        <div class="section-divider"></div>
                                        @include('website.inc.messages')
                                        <div class="table-cont">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Type d'absence</th>
                                                        <th>Motif</th>
                                                        <th>Date début d'absence</th>
                                                        <th>Date de reprise de poste</th>
                                                        <th>Nombre de jour(s) </th>
                                                        <th>Prestataire</th>
                                                        <th>Etat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absences as $item)
                                                        <tr>
                                                            <td>
                                                                {{ $item->typedemandes->type_absence_name }}
                                                                {{-- <ul class="job-dashboard-actions">
                                                                    <li>
                                                                        <a href="{{ URL::route('client.absences.show', $item->id) }}"
                                                                            class="job-dashboard-action-edit">
                                                                            Voir
                                                                        </a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="{{ route('client.absences.edit', $item->id) }}"
                                                                            class="job-dashboard-action-edit">Valider</a>
                                                                    </li>
                                                                </ul> --}}
                                                            </td>
                                                            <td>{{ $item->motif_demande ? $item->motif_demande : 'N/A' }}</td>
                                                            <td>{{ $item->date_demande ? Carbon\Carbon::parse($item->date_demande)->format('d/m/Y') : 'N/A' }}
                                                            </td>
                                                            <td>{{ $item->date_reprise ? Carbon\Carbon::parse($item->date_reprise)->format('d/m/Y') : 'N/A' }}
                                                            </td>
                                                            <td>{{ $item->dure_absence }}</td>
                                                            <td>{{ $item->last_name }} {{ $item->first_name }}</td>
                                                            <td>
                                                                @if ($item->is_valide == 0)
                                                                    <label class="text-danger">En attente</label>
                                                                @elseif($item->is_valide == 1)
                                                                    <label class="text-success">Accepter</label>
                                                                @elseif($item->is_valide == 2)
                                                                    <label class="text-danger">Rejeter</label>
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


    </div>

    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

    @include('website.partials.js')



</body>


<!-- account 07:01:11 GMT -->
</html>
