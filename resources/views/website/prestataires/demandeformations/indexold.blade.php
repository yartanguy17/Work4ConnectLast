@extends('website.prestataires.layouts.app')

@section('title', 'Mes demandes de formation en attente')

@section('content')
    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->
            <div class="header_btm">
                <h2>Mes demandes de formation en attente</h2>
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
                                    <h6>Vos demandes de formation en attente sont présentées dans le tableau ci-dessous.
                                    </h6>
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
                                                        <ul class="job-dashboard-actions">
                                                            <li>
                                                                <a href="{{ route('prestataire.formation.view', $demande->id) }}"
                                                                    class="job-dashboard-action-mark_filled">
                                                                    Voir</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('prestataire.demandeformations.edit', $demande->id) }}"
                                                                    class="job-dashboard-action-mark_filled">
                                                                    Modifier</a>
                                                            </li>
                                                            <li>
                                                                <a class="job-dashboard-action-delete"
                                                                    onclick="deleteConfirmation('{{ $demande->id }}')">Supprimer</a>
                                                            </li>
                                                        </ul>
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
    <script type="text/javascript">
        //Delete
        function deleteConfirmation(id) {
            swal({
                title: 'Supprimer',
                text: 'Etes-vous sûr de vouloir supprimer demande de formation?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Oui',
                cancelButtonText: 'Non',
                closeOnConfirm: true,
            }, function() {
                $.ajax({
                    type: 'GET',
                    url: "{{ url('deletedemandeformations') }}/" + id,
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
