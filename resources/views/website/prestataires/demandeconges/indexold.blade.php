@extends('website.prestataires.layouts.app')

@section('title', 'Demandes de congés')

@section('content')
    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->

            <div class="header_btm">
                <h2>Demandes de congés</h2>
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
                                    <h6>Demandes de congés</h6>
                                    <a class="btn btn-primary mypbtn"
                                        href="{{ route('prestataire.demandeconges.create') }}">Demandes de congés</a>
                                </div>
                                <div class="section-divider"></div>
                                @include('website.inc.messages')
                                <div class="table-cont">
                                    <table class="table table-striped table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Type de congés</th>
                                                <th>Motif</th>
                                                <th>Date début</th>
                                                <th>Date fin</th>
                                                <th>Date de reprise</th>
                                                <th>Nombre de jours</th>
                                                <th>Etat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($demandeconges as $item)
                                                <tr>
                                                    <td>
                                                        {{ $item->typeconges->type_conge_name }}
                                                        <ul class="job-dashboard-actions">
                                                            <li>
                                                                <a href="{{ URL::route('prestataire.demandeconges.show', $item->id) }}"
                                                                    class="job-dashboard-action-edit">
                                                                    Voir
                                                                </a>
                                                            </li>
                                                            @if ($item->is_valide == 0)
                                                                <li>
                                                                    <a href="{{ route('prestataire.demandeconges.edit', $item->id) }}"
                                                                        class="job-dashboard-action-edit">Modifier</a>
                                                                </li>
                                                                <li>
                                                                    <a class="job-dashboard-action-delete"
                                                                        onclick="deleteConfirmation('{{ $item->id }}')">Supprimer</a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </td>
                                                    <td> {{ $item->motif_conge ? $item->motif_conge : 'N/A' }}</td>
                                                    <td>{{ $item->date_demande_conge ? date('d/m/Y', strtotime($item->date_demande_conge)) : 'N/A' }}
                                                    </td>
                                                    <td>{{ $item->date_return_conge ? date('d/m/Y', strtotime($item->date_return_conge)) : 'N/A' }}
                                                    </td>
                                                    <td>{{ $item->date_reprise_conge ? date('d/m/Y', strtotime($item->date_reprise_conge)) : 'N/A' }}
                                                    </td>
                                                    <td>{{ $item->number_day }}</td>
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
                text: 'Etes-vous sûr de vouloir supprimer demande de congé?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Oui',
                cancelButtonText: 'Non',
                closeOnConfirm: true,
            }, function() {
                $.ajax({
                    type: 'GET',
                    url: "{{ url('deletedemandeconges') }}/" + id,
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
