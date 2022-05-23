@extends('admin.layouts.app')

@section('title', 'Détail Requêtes')

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Détail Requête</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Tableau de bord</a></li>
                    <li class="breadcrumb-item"><a href="#">Requête</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Détail</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="btn-toolbar p-3" role="toolbar">
                </div>
                <div class="card-body">
                    <div class="row form-row">
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">Date requête</h4>
                            <p>{{ \Carbon\Carbon::parse($quotation->created_at)->format('d/m/Y') }}</p>
                        </div>


                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">Nom et Prénom(s)</h4>
                            <p>{{ $quotation->last_name }} {{ $quotation->first_name }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">Civilité</h4>
                            <p>
                                @if ($quotation->gender == 'M')
                                    Homme
                                @else
                                    Femme
                                @endif
                            </p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">Secteur d'activité</h4>
                            <p>{{ $quotation->secteur->title }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">Email</h4>
                            <p>{{ $quotation->email }}</p>
                        </div>

                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">Téléphone</h4>
                            <p>{{ $quotation->phone_number }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">Date du rappel</h4>
                            <p>{{ $quotation->quotation_date }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">Page horaire</h4>
                            <p>{{ $quotation->range }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h4 class="mt-0 font-size-16">Statut</h4>
                            <p>
                                @if ($quotation->status)
                                    <span class="badge rounded-pill bg-success">Traitée</span>
                                @else
                                    <span class="badge rounded-pill bg-warning">En attente</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <hr>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary waves-effect mt-4"><i
                            class="mdi mdi-reply"></i> Retour</a>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
