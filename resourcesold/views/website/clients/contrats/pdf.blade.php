<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Basic Page Needs
        ================================================== -->
    <title>Work4connect</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <!-- CSS
        ================================================== -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <style type="text/css" media="screen">
        html {
            font-family: sans-serif;
            line-height: 1.15;
            margin: 0;
        }

        body {
            margin: 0;
            font-family: "Roboto", sans-serif;
            font-size: .875rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #f8f8fa;
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: transparent;
        }

        .font-size-16 {
            font-size: 16px !important;
        }

        .float-end {
            float: right !important;
        }

        .row {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-top: calc(var(--bs-gutter-y) * -1);
            margin-right: calc(var(--bs-gutter-x)/ -2);
            margin-left: calc(var(--bs-gutter-x)/ -2);
        }

        .mt-0 {
            margin-top: 0 !important;
        }

        .col-12 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 100%;
        }

        .col-5 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 41.66667%;
        }

        .col-2 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 16.66667%;
        }

        address {
            margin-bottom: 1rem;
            font-style: normal;
            line-height: inherit;
        }

        .text-end {
            text-align: right !important;
        }

        .mt-4 {
            margin-top: 1.5rem !important;
        }

        .p-2 {
            padding: .5rem !important;
        }

        .p-0 {
            padding: 0 !important;
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table {
            --bs-table-bg: transparent;
            --bs-table-striped-color: #212529;
            --bs-table-striped-bg: #f8f9fa;
            --bs-table-active-color: #212529;
            --bs-table-active-bg: #f8f9fa;
            --bs-table-hover-color: #212529;
            --bs-table-hover-bg: #f8f9fa;
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            vertical-align: top;
            border-color: #e9ecef;
        }

        table {
            caption-side: bottom;
            border-collapse: collapse;
        }

        .table>thead {
            vertical-align: bottom;
        }

        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }

        .text-center {
            text-align: center !important;
        }

        h4 {
            margin-top: 0;
            margin-bottom: 0.5rem;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        strong {
            font-weight: bolder;
        }

        img {
            vertical-align: middle;
            border-style: none;
        }

        table {
            border-collapse: collapse;
        }

        th {
            text-align: inherit;
        }

        h4,
        .h4 {
            margin-bottom: 0.5rem;
            font-weight: 500;
            line-height: 1.2;
        }

        h4,
        .h4 {
            font-size: 1.5rem;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .pr-0,
        .px-0 {
            padding-right: 0 !important;
        }

        .pl-0,
        .px-0 {
            padding-left: 0 !important;
        }

        .text-right {
            text-align: right !important;
        }

        .text-center {
            text-align: center !important;
        }

        .text-uppercase {
            text-transform: uppercase !important;
        }

        * {
            font-family: "DejaVu Sans";
        }

        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        table,
        th,
        tr,
        td,
        p,
        div {
            line-height: 1.1;
        }

        .party-header {
            font-size: 1.5rem;
            font-weight: 400;
        }

        .total-amount {
            font-size: 12px;
            font-weight: 700;
        }

        .border-0 {
            border: none !important;
        }

        .leftBorder {
            border-left: none !important;
        }

        .bottomBorder {
            border-bottom: none !important;
        }

        .sign {
            max-width: 100%;
            height: 85px;
        }

    </style>
</head>

<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="invoice-title">
                                            <h4 class="float-end font-size-16"><strong>Contrat
                                                    #{{ $contrat->id }}</strong></h4>
                                        </div>
                                        <!--<hr>-->
                                        <div class="col-12 p-2">
                                            <div class="p-0">
                                                <h4 class="font-size-16"><strong>ENTRE LES SOUSSIGNES :</strong></h4>
                                            </div>
                                        </div>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="px-0">
                                                        <address>
                                                            <strong>Le Prestataire :</strong><br>
                                                            {{ $contrat->prestataire->last_name }}
                                                            {{ $contrat->prestataire->first_name }}<br>
                                                            {{ $contrat->prestataire->phone_number }} <br>
                                                            {{ $contrat->prestataire->email }}<br>
                                                            {{ $contrat->prestataire->address }}
                                                        </address>
                                                        <div class="p-0">
                                                            <h3 class="font-size-16"><strong>D'UNE PART,</strong></h3>
                                                        </div>
                                                    </td>
                                                    <td class="border-0">
                                                        <h3 class="font-size-16"><strong>ET</strong></h3>
                                                    </td>
                                                    <td class="px-0">
                                                        <address>
                                                            <strong>Le Client :</strong><br>
                                                            {{ auth()->user()->last_name }}
                                                            {{ auth()->user()->first_name }}<br>
                                                            {{ auth()->user()->phone_number }} <br>
                                                            {{ auth()->user()->email }}<br>
                                                            {{ auth()->user()->address }}
                                                        </address>
                                                        <div class="p-0">
                                                            <h3 class="font-size-16"><strong>D'AUTRE PART,</strong>
                                                            </h3>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            <div class="p-2">
                                                <h3 class="font-size-16"><strong>IL A ETE ARRETE CE QUI SUIT:</strong>
                                                </h3>
                                            </div>
                                            <div class="">
                                                <div class="p-2">
                                                    <h3 class="font-size-16"><strong>IL A ETE CONVENU CE QUI
                                                            SUIT:</strong>
                                                    </h3>
                                                </div>
                                                <div class="">
                                                    <div class="p-2">
                                                        <h3 class="font-size-16"><strong>MOTIF </strong></h3>
                                                        <p>Le prestataire {{ $contrat->prestataire->last_name }}
                                                            {{ $contrat->prestataire->first_name }} est engagé par
                                                            {{ $contrat->client->last_name }}
                                                            {{ $contrat->client->first_name }} pour une mission
                                                            {{ $contrat->motif_contrat }}
                                                            d’applications web.
                                                        </p>
                                                    </div>

                                                    @if ($contrat->date_fin != '')
                                                        <div class="p-2">
                                                            <h3 class="font-size-16"><strong> DUREE </strong></h3>
                                                            <p>Le présent contrat prend effet le
                                                                {{ \Carbon\Carbon::parse($contrat->date_effet)->format('d/m/Y') }}
                                                                et prendra fin de plein droit
                                                                et sans formalité le
                                                                {{ \Carbon\Carbon::parse($contrat->date_fin)->format('d/m/Y') }}
                                                            </p>
                                                        </div>

                                                    @else

                                                        <div class="p-2">
                                                            <h3 class="font-size-16"><strong> DUREE </strong></h3>
                                                            <p>Le présent contrat prend effet le
                                                                {{ \Carbon\Carbon::parse($contrat->date_effet)->format('d/m/Y') }}
                                                                pour une durée indeterminée
                                                            </p>
                                                        </div>
                                                    @endif


                                                    <div class="p-2">
                                                        <h3 class="font-size-16"><strong>LIEU DE TRAVAIL</strong></h3>
                                                        <p>
                                                            Le lieu de travail est situé à
                                                            {{ $contrat->exercice_place }}
                                                        </p>
                                                    </div>


                                                    <div class="p-2">
                                                        <h3 class="font-size-16"><strong>DUREE DU TRAVAIL </strong>
                                                        </h3>
                                                        <p>
                                                            Les horaires seront les suivants:
                                                        </p>
                                                        <p>
                                                            {!! $contrat->working_description !!}
                                                        </p>
                                                    </div>


                                                    <div class="p-2">
                                                        <h3 class="font-size-16"><strong> REMUNERATION </strong></h3>
                                                        <p>
                                                            En contrepartie de ses fonctions, le prestataire
                                                            {{ $contrat->prestataire->last_name }}
                                                            {{ $contrat->prestataire->first_name }} percevra un
                                                            salaire
                                                            mensuel
                                                            de {{ $contrat->salary }} FCFA
                                                            pour l’horaire moyen de (40) heures travaillés par semaine
                                                            dans
                                                            l’Entreprise.
                                                        </p>
                                                    </div>

                                                    @if ($contrat->paid_leave)
                                                        <div class="p-2">
                                                            <h3 class="font-size-16"><strong>CONGE PAYE</strong></h3>
                                                            <p>
                                                                L’employé bénéficiera d’un conge paye annuel de
                                                                {{ $contrat->duree_paid_leave }} jours conformément
                                                                aux dispositions légales et conventionnelles prévues et
                                                                applicables en la matière
                                                            </p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 mt-4">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="px-0">
                                                                <div class="mt-4">
                                                                    <div class="p-2">
                                                                        <h3 class="font-size-16">
                                                                            <strong>L'Employé*</strong>
                                                                        </h3>
                                                                    </div>
                                                                    <div class="p-4">
                                                                        <p></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="px-0">
                                                                <div class="mt-4 text-end">
                                                                    <div class="p-2">
                                                                        <h3 class="font-size-16"><strong>Pour
                                                                                Work4connect</strong></h3>
                                                                    </div>
                                                                    <div class="p-4">
                                                                        <p></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mt-4 text-center">
                                                <div class="p-4">
                                                    <p style="font-style: italic;">(*) Signature de l'Employé précédée
                                                        de la mention manuscrite « Lu et approuvé »</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
