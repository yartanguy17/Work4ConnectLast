@extends('website.prestataires.layouts.app')

@section('title', 'Modifier la demande')

@section('content')
    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->
            <div class="header_btm">
                <h2>Modifier la demande</h2>
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
                                    <h5>Modifier la demande</h5>
                                </div>
                                <div class="section-divider"></div>
                                @include('website.inc.messages')
                                <form action="{{ route('prestataire.demandeabsences.update', $demandeabsences->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="big_form_group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label>Type d'absence : <span class="text-danger">*</span></label>
                                                    <select class="form-control" name="type_absence_id">
                                                        @foreach ($typeabsences as $item)
                                                            <option value="{{ $item->id }}" @if ($item->id == $demandeabsences->type_absence_id) selected='selected' @endif>
                                                                {{ $item->type_absence_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label>Date demande : <span class="text-danger">*</span></label>
                                                    <input type="date" id="begin_date" class="form-control"
                                                        name="date_demande" value="{{ $demandeabsences->date_demande }}"
                                                        onchange="NombreJours()">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label>Nombre de jours : </label>
                                                    <input type="text" class="form-control" id="numdays"
                                                        name="dure_absence" value="{{ $demandeabsences->dure_absence }}"
                                                        required readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label>Date de reprise : <span class="text-danger">*</span></label>
                                                    <input type="date" id="end_date" class="form-control"
                                                        name="date_reprise" value="{{ $demandeabsences->date_reprise }}"
                                                        onchange="NombreJours()">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label>Motif : </label>
                                                    <textarea type="text" rows="4" class="form-control"
                                                        name="motif_demande">
                                                                          {{ $demandeabsences->motif_demande }}
                                                                        </textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label>Contrat : <span class="text-danger">*</span></label>
                                                    <select class="form-control" name="contrat_id">
                                                        @foreach ($contrats as $item)
                                                            <option value="{{ $item->id }}" @if ($item->id == $demandeabsences->contrat_id) selected='selected' @endif>
                                                                {{ $item->type->title_type_con }}({{ $item->client->last_name }}
                                                                {{ $item->client->first_name }}
                                                                {{ \Carbon\Carbon::parse($item->date_effet)->format('d/m/Y') }}
                                                                -
                                                                {{ \Carbon\Carbon::parse($item->date_fin)->format('d/m/Y') }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-9 ">
                                            <button type="submit" class="btn btn-primary">Modifier la demande</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
