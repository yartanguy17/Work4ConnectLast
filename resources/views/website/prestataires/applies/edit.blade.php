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

        @section('title', 'Modifier ma candidature')

        @section('content')
            <header class="header_01 header_inner">
                <div class="header_main">
                    <!-- Header -->
                    @include('website.partials.header')
                    <!--/ Header -->
                    <div class="header_btm">
                        <h2>Modifier ma candidature</h2>
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
                                            <h5>Modifier ma candidature</h5>
                                        </div>
                                        <div class="section-divider">
                                        </div>
                                        @include('website.inc.messages')
                                        <form method="POST" action="{{ route('prestataire.applies.update', $apply->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="big_form_group">
                                                <div class="row">
                                                    <input type="hidden" name="offer_id" value="{{ $apply->offer_id }}">
                                                    <div class="col-md-12" id="">
                                                        <div class="form-group">
                                                            <span><i class="fa fa-upload"></i> Télécharger CV</span>
                                                            <input type="file" class="upload" id="" name="cv_file">
                                                            <small class="form-text text-muted">Format autorisé doc, docx ou PDF.
                                                                Taille maximale de 2MB</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12" id="">
                                                        <div class="form-group">
                                                            <span><i class="fa fa-upload"></i> Télécharger Lettre de
                                                                motivation</span>
                                                            <input type="file" class="upload" id="" name="cover_letter_file"
                                                                required>
                                                            <small class="form-text text-muted">Format autorisé doc, docx ou PDF.
                                                                Taille maximale de 2MB</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group ">
                                                            <label>Description et motivation</label>
                                                            <textarea class="form-control"
                                                                name="cover_letter">{{ $apply->cover_letter }}</textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-9 ">
                                                    <button type="submit" class="btn btn-primary"> {{ __('welcome.form.update') }}</button>
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
