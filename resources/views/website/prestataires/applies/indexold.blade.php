@extends('website.prestataires.layouts.app')

@section('title', 'Mes candidatures')

@section('content')
    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->
            <div class="header_btm">
                <h2>Mes candidatures</h2>
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
                                    <h6>Vos candidatures sont présentées dans le tableau ci-dessous.</h6>
                                </div>
                                @include('website.inc.messages')
                                <div class="table-cont">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Titre</th>
                                                <th>Statut</th>
                                                <th>Avis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($applies as $apply)
                                                <tr>
                                                    <td>
                                                        <h6><a href="#">{{ $apply->title_offer }}</a></h6>
                                                        <ul class="job-dashboard-actions">
                                                            <li>
                                                                <a href="{{ route('prestataire.applies.edit', $apply->id) }}"
                                                                    class="job-dashboard-action-edit">
                                                                    Modifier
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        @if ($apply->status)
                                                            <label class="text-success">Publié</label>
                                                        @else
                                                            <label class="text-danger">En attente</label>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($apply->is_active)
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
