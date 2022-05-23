<!DOCTYPE html>
<html lang="en">


<!-- account 07:01:11 GMT -->
@include('website.partials.header')

<body>
    <div class="boxed_wrapper">

        <div class="preloader"></div>

        @include('website.partials.menu')
        <!--End Main Header-->

        @extends('website.prestataires.layouts.app')

        @section('title', 'Modifier une demande de formation')

        @section('content')
            <header class="header_01 header_inner">
                <div class="header_main">
                    <!-- Header -->
                    @include('website.partials.header')
                    <!--/ Header -->
                    <div class="header_btm">
                        <h2>Modifier une demande de formation</h2>
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
                                            <h5>Modifier une demande de formation</h5>
                                        </div>
                                        <div class="section-divider">
                                        </div>

                                        @include('website.inc.messages')

                                        <form method="POST"
                                            action="{{ route('prestataire.demandeformations.update', $demande->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="big_form_group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label class="form-label">Formation <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-control select" name="formation_id">
                                                                @foreach ($formations as $formation)
                                                                    <option value="{{ $formation->id }}"
                                                                        {{ $demande->formation_id == $formation->id ? 'selected' : '' }}>
                                                                        {{ $formation->title_formation }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label>Motif de la demande <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                name="motif_dem_for" value="{{ $demande->motif_dem_for }}" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea class="form-control"
                                                                name="description_dem_for">{!! $demande->description_dem_for !!}</textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-9 ">
                                                    <button type="submit" class="btn btn-primary">Modifier</button>
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


    </div>

    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

    @include('website.partials.js')



</body>


<!-- account 07:01:11 GMT -->
</html>
