@extends('website.prestataires.layouts.app')

@section('title', 'Faire une demande')
@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
@section('content')
    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->
            <div class="header_btm">
                <h2>Faire une demande</h2>
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
                                    <h5>Faire une demande</h5>
                                </div>
                                <div class="section-divider"></div>
                                @include('website.inc.messages')
                                <form action="{{ route('prestataire.demandeconges.store') }}" method="POST">
                                    @csrf
                                    <div class="big_form_group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label>Type de congé : <span class="text-danger">*</span></label>
                                                    <select class="form-control" name="type_conge_id" required>
                                                        <option value="">--Sélectionner type de congé--</option>
                                                        @foreach ($typeconges as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('type_conge_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->type_conge_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label>Date début : <span class="text-danger">*</span></label>
                                                    <input type="date" id="begin_date" class="form-control"
                                                        name="date_demande_conge"
                                                        value="{{ old('date_demande_conge') ?? date('Y-m-d') }}"
                                                        onchange="NombreJours()" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label>Nombre de jours : </label>
                                                    <input type="text" class="form-control" id="numdays" name="number_day"
                                                        value="{{ old('number_day') }}" required readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date fin : <span class="text-danger">*</span></label>
                                                    <input type="date" id="end_date" class="form-control"
                                                        name="date_return_conge"
                                                        value="{{ old('date_return_conge') ?? date('Y-m-d') }}"
                                                        onchange="NombreJours()" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label>Motif : </label>
                                                    <textarea type="text" rows="3" class="form-control"
                                                        name="motif_conge">
                                                      {{ old('motif_conge') }}
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Contrat : <span class="text-danger">*</span></label>
                                                    <select class="form-control" name="contrat_id" required>
                                                        <option value="">--Sélectionner contrat --</option>
                                                        @foreach ($contrats as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('contrat_id') == $item->id ? 'selected' : '' }}>
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
                                            <button type="submit" class="btn btn-primary">Demander</button>
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
