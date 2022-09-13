@extends('website.prestataires.layouts.app')

@section('title', 'Postuler à une annonce')

@section('content')
    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->
            <div class="header_btm">
                <h2>Postuler à une annonce</h2>
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
                                    <h5>Postuler à cette annonce</h5>
                                </div>
                                <div class="section-divider">
                                </div>

                                @include('website.inc.messages')

                                <form action="{{ route('prestataire.applies.store') }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf

                                    <div class="big_form_group">
                                        <div class="row">
                                            <input type="hidden" name="offer_id" value="{{ $offer->id }}">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row form-row">
                                                            <div class="col-12 col-sm-6">
                                                                <h6 class="mt-0 font-size-16">Titre de l'annonce</h6>
                                                                <p>{{ $offer->title_offer }}</p>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <h6 class="mt-0 font-size-16">Type contrat</h6>
                                                                <p>{{ $offer->typecontrat->title_type_con }}</p>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <h6 class="mt-0 font-size-16">Ville</h6>
                                                                <p>{{ $offer->villes->title_ville }}</p>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <h6 class="mt-0 font-size-16">Secteur d'activité </h6>
                                                                <p>{{ $offer->secteurs->title_secteur }}</p>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <h6 class="mt-0 font-size-16">Type d'emploi</h6>
                                                                <p>{{ $offer->types->title_job_ty }}</p>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <h6 class="mt-0 font-size-16">Nombre de poste(s)</h6>
                                                                <p>
                                                                    {{ $offer->vacancies ? $offer->vacancies : 'N/A' }}
                                                                </p>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <h6 class="mt-0 font-size-16">Salaire</h6>
                                                                @if ($offer->expected_salary > 0)
                                                                    <p> {{ $offer->expected_salary }} </p>
                                                                @else
                                                                    <p>N/A</p>
                                                                @endif
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <h6 class="mt-0 font-size-16">Nombre d'année(s) d'expérience
                                                                </h6>

                                                                @if ($offer->total_experience > 0)
                                                                    <p> {{ $offer->total_experience }} </p>
                                                                @else
                                                                    <p>N/A</p>
                                                                @endif
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <h6 class="mt-0 font-size-16">Date début poste</h6>
                                                                <p> {{ \Carbon\Carbon::parse($offer->start_date)->format('d/m/Y') }}
                                                                </p>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <h6 class="mt-0 font-size-16">Date fin poste</h6>
                                                                <p> {{ $offer->end_date ? Carbon\Carbon::parse($offer->end_date)->format('d/m/Y') : 'N/A' }}
                                                                </p>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <h6 class="mt-0 font-size-16">Mission du candidat</h6>
                                                                @if ($offer->mission != null)
                                                                    <p> {!! html_entity_decode($offer->mission) !!} </p>
                                                                @else
                                                                    <p>N/A</p>
                                                                @endif
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <h6 class="mt-0 font-size-16">Profil recherché</h6>
                                                                @if ($offer->profile != null)
                                                                    <p> {!! html_entity_decode($offer->profile) !!} </p>
                                                                @else
                                                                    <p>N/A</p>
                                                                @endif
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <h6 class="mt-0 font-size-16">Description</h6>
                                                                @if ($offer->description_offer != null)
                                                                    <p> {!! html_entity_decode($offer->description_offer) !!} </p>
                                                                @else
                                                                    <p>N/A</p>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (auth()->user()->type_users == 'prestataire')
                                                <div class="col-md-12" id="">
                                                    <div class="form-group">
                                                        <span><i class="fa fa-upload"></i> Télécharger CV
                                                            (Optionnel)</span>
                                                        <input type="file" class="upload" name="cv_file">
                                                        <small class="form-text text-muted">Format autorisé doc, docx ou
                                                            PDF.
                                                            Taille maximale de 2MB</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" id="">
                                                    <div class="form-group">
                                                        <span><i class="fa fa-upload"></i> Télécharger Lettre de
                                                            motivation (Optionnel)</span>
                                                        <input type="file" class="upload" name="cover_letter_file">
                                                        <small class="form-text text-muted">Format autorisé doc, docx ou
                                                            PDF.
                                                            Taille maximale de 2MB</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group ">
                                                        <label>Description et motivation</label>
                                                        <textarea class="form-control" name="cover_letter"></textarea>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-9 ">
                                            <button type="submit" class="btn btn-primary">Postuler</button>
                                        </div>
                                    </div>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
