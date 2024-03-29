@extends('website.prestataires.layouts.app')

@section('title', 'Demandes d\'absences')

@section('content')
    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->
            <div class="header_btm">
                <h2>Demandes d'absences</h2>
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
                                    <h6>Demandes d'absences</h6>
                                    <a class="btn btn-primary mypbtn"
                                        href="{{ route('prestataire.demandeabsences.create') }}">Demandes d'absences</a>
                                </div>
                                <div class="section-divider"></div>
                                @include('website.inc.messages')
                                <div class="table-cont">
                                    <table class="table table-striped table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Type d'absence</th>
                                                <th>Motif</th>
                                                <th>Date de demande</th>
                                                <th>Date de reprise</th>
                                                <th>Nombre de jours</th>
                                                <th>Etat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($demandeabsences as $item)
                                                <tr>
                                                    <td>
                                                        {{ $item->typedemandes->type_absence_name }}
                                                        <ul class="job-dashboard-actions">
                                                            <li>
                                                                <a href="{{ URL::route('prestataire.demandeabsences.show', $item->id) }}"
                                                                    class="job-dashboard-action-edit">
                                                                    Voir
                                                                </a>
                                                            </li>
                                                            @if ($item->is_valide == 0)
                                                                <li>
                                                                    <a href="{{ route('prestataire.demandeabsences.edit', $item->id) }}"
                                                                        class="job-dashboard-action-edit">Modifier</a>
                                                                </li>
                                                                <li>
                                                                    <a class="job-dashboard-action-delete"
                                                                        onclick="deleteConfirmation('{{ $item->id }}')">Supprimer</a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </td>
                                                    <td>{{ $item->motif_demande ? $item->motif_demande : 'N/A' }}</td>
                                                    <td>{{ $item->date_demande ? date('d/m/Y', strtotime($item->date_demande)) : 'N/A' }}
                                                    </td>
                                                    <td>{{ $item->date_reprise ? date('d/m/Y', strtotime($item->date_reprise)) : 'N/A' }}
                                                    </td>
                                                    <td>{{ $item->dure_absence }}</td>
                                                    <td>
                                                        @if ($item->is_valide == 0)
                                                            <label class="text-danger">En attente</label>
                                                        @elseif($item->is_valide == 1)
                                                            <label class="text-success">Accepté</label>
                                                        @elseif($item->is_valide == 2)
                                                            <label class="text-danger">Rejété</label>
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
    <script type="text/javascript">
        //Delete
        function deleteConfirmation(id) {
            swal({
                title: 'Supprimer',
                text: 'Etes-vous sûr de vouloir supprimer demande d\'absence?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Oui',
                cancelButtonText: 'Non',
                closeOnConfirm: true,
            }, function() {
                $.ajax({
                    type: 'GET',
                    url: "{{ url('deletedemandeabsences') }}/" + id,
                    dataType: "json",
                    success: function(data) {
                        if (data.success === true) {
                            swal("Supprimer!", data.message, "success");
                            location.reload();
                        } else {
                            swal("Erreur!", data.message, "error");
                        }
                    }
                });
            });
        }
    </script>
@endsection
