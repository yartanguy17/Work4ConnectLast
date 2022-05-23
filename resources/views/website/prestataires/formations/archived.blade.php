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

@section('title', 'Mes formations suivies')

@section('content')
    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->
            <div class="header_btm">
                <h2>Mes formations suivies</h2>
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
                                    <h6>Vos formations suivies sont présentés dans le tableau ci-dessous.</h6>
                                </div>
                                @include('website.inc.messages')
                                <div class="table-cont">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date de la formation</th>
                                                <th>Titre formation</th>
                                                <th>Type formation</th>
                                                <th>Date début</th>
                                                <th>Date Fin</th>
                                                <th>Statut </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($participations as $participation)
                                                <tr>
                                                    <td>
                                                        <h6><a
                                                                href="#">{{ \Carbon\Carbon::parse($participation->formation->created_at)->format('d/m/Y') }}</a>
                                                        </h6>
                                                        <ul class="job-dashboard-actions">
                                                            <li>
                                                                <a href="{{ route('prestataire.formation.view', $participation->id) }}"
                                                                    class="job-dashboard-action-mark_filled">
                                                                    Voir</a>
                                                            </li>
                                                        </ul>
                                                    </td>

                                                    <td>
                                                        {{ $participation->formation->title_formation }}
                                                    </td>

                                                    <td>
                                                        {{ $participation->formation->types->title_type_for }}
                                                    </td>


                                                    <td>
                                                        {{ Carbon\Carbon::parse($participation->formation->date_debut)->format('d/m/Y') }}
                                                    </td>

                                                    <td>
                                                        {{ Carbon\Carbon::parse($participation->formation->date_fin)->format('d/m/Y') }}
                                                    </td>

                                                    <td>
                                                        @if ($participation->status)
                                                            <label class="text-success">Actif</label>
                                                        @else
                                                            <label class="text-danger">Inactif</label>
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
@endsection


    </div>

    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

    @include('website.partials.js')



</body>


<!-- account 07:01:11 GMT -->
</html>
