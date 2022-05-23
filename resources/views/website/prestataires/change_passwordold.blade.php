@extends('website.prestataires.layouts.app')

@section('title', 'Changer mot de passe')

@section('content')
    <!-- Header 01
        ================================================== -->
    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->

            <div class="header_btm">
                <h2>Changer mot de passe</h2>
            </div>
        </div>
    </header>
    <!-- Main
          ================================================== -->

    <!-- Main
        ================================================== -->
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
                                    <h5>Changer mot de passe</h5>
                                </div>
                                <div class="section-divider"></div>
                                @include('website.inc.messages')
                                <form action="{{ route('prestataire.update_password') }}" method="POST">
                                    @csrf

                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="current-password">Mot de passe actuel</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control" placeholder="" name="old_password"
                                                id="current-password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="new-password">Nouveau mot de passe</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control" placeholder="" name="new_password"
                                                id="new-password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="confirm-new-password">Confirmation du mot de passe</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control" placeholder=""
                                                name="confirm_password" id="confirm-new-password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-9 offset-md-3">
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
