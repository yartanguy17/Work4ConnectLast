@extends('website.prestataires.layouts.app')

@section('title', 'Faire une demande de formation')

@section('content')
    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->
            <div class="header_btm">
                <h2>Faire une demande de formation</h2>
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
                                    <h5>Faire une demande de formation</h5>
                                </div>
                                <div class="section-divider">
                                </div>

                                @include('website.inc.messages')

                                <form action="{{ route('prestataire.demandeformations.store') }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf

                                    <div class="big_form_group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="form-label">Formation <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-control select" name="formation_id" required>
                                                        <option value="">--Sélectionner formation--</option>
                                                        @foreach ($formations as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('formation_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->title_formation }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label>Motif de la demande <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" placeholder=""
                                                        name="motif_dem_for" value="{{ old('motif_dem_for') }}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group ">
                                                    <label>Description</label>
                                                    <textarea class="form-control"
                                                        name="description_dem_for">{{ old('description_dem_for') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-9 ">
                                            <button type="submit" class="btn btn-primary">Soumettre</button>
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
