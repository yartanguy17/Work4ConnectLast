<!DOCTYPE html>
<html lang="fr">

<head>
    <title>{{ __('messages.form.invoice') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/print.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <main>
        @switch($contrat->type_contrat)
            {{-- MER => Mise en relation --}}
            @case('MER')
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <img src="{{ asset('images/logo.png') }}" alt="">
                        <div class="font-700 text-uppercase prestater-name">Nearshoring</div>
                        <div class="font-10">356 Rue Aniko Palako, Lomé Togo</div>
                        <div class="font-10">infos@centralressource.com</div>
                    </div>

                    <div class="text-end">
                        <div class="font-700 text-uppercase client-name">Client</div>
                        <div>{{ $contrat->client['last_name'] . ' ' . $contrat->client['first_name'] }}</div>
                        <div>{{ $contrat->client['email'] }}</div>
                        <div>{{ $contrat->client['address'] }}</div>
                    </div>
                </div>



                <div class="text-center text-uppercase">Lomé le,
                    {{ $facture->date_facture }}
                </div>

                <div class="text-center text-uppercase font-700" style="font-size: 30px">Facture
                    N<sup>O</sup> {{ $facture->reference }}</div>

                <div class="mb-3">
                    <table>
                        <thead>
                            <tr>
                                <th>Intervenant</th>
                                <th>Libellé</th>
                                <th>Nb Heure</th>
                                <th>TH</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $contrat->prestataire['last_name'] . ' ' . $contrat->prestataire['first_name'] }}
                                </td>

                                <td> {{ $contrat->type['title_type_con'] }}</td>
                                <td> {{ $contrat->daily_hourly_rate * 30 }}</td>
                                <td>{{ $contrat->nbreheure }}</td>
                                <!-- <td>{{ \Carbon\Carbon::parse($contrat->date_fin)->format('d/m/Y') }}</td> -->
                                <td>{{ $facture->amount }} F CFA</td>
                            </tr>
                        </tbody>
                    </table>

                    <div style="font-size: 10px; margin: 10px 0 0 0; text-align: end">
                        *Le présent contrat prend effet le
                        {{ \Carbon\Carbon::parse($contrat->date_effet)->format('d/m/Y') }}
                        et prendra fin de plein droit
                        et sans formalité le
                        {{ \Carbon\Carbon::parse($contrat->date_fin)->format('d/m/Y') }}
                    </div>
                </div>


                <div class="text-end justify-content-between align-items-center" style="width: 100%; display: flex">
                    <div style="width: 60%;margin-right: 100px; font-size: 12px">
                        Arreter a la presente somme de
                        <div class="font-700 mt-3"> ........................................................ CFA</div>
                    </div>
                    <div style="width: 40%; flex: none">
                        <div class="d-flex justify-content-between text-uppercase">
                            <div>Prix HT </div>
                            <div class="font-700">0 CFA</div>
                        </div>
                        <div class="d-flex justify-content-between text-uppercase">
                            <div>Prix TVA </div>
                            <div class="font-700">0 CFA</div>
                        </div>
                        <div class="d-flex justify-content-between text-uppercase" style="font-size: 20px">
                            <div>Prix TTC </div>
                            <div class="font-700">0 CFA</div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-5">
                    <div class="mb-5 pb-3 text-uppercase">Le Prestataire</div>
                    <div class="mb-5 pb-3 text-uppercase">Le Client</div>
                </div>
            @break

            {{-- SAL => Salarié --}}
            @case('SAL')
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <img src="{{ asset('images/logo.jpg') }}" alt="">
                        <div class="font-700 text-uppercase prestater-name">Nearshoring</div>
                        <div class="font-10">356 Rue Aniko Palako, Lomé Togo</div>
                        <div class="font-10">infos@centralressource.com</div>
                    </div>

                    <div class="text-end">
                        <div class="font-700 text-uppercase client-name">Client</div>
                        <div>{{ $contrat->client['last_name'] . ' ' . $contrat->client['first_name'] }}</div>
                        <div>{{ $contrat->client['email'] }}</div>
                        <div>{{ $contrat->client['address'] }}</div>
                    </div>
                </div>

                <div class="text-center text-uppercase">Lomé le,
                    {{ $facture->date_facture }}</div>
                <div class="text-center text-uppercase font-700" style="font-size: 30px">Facture
                    N<sup>O</sup>{{ $facture->id }}</div>

                <div class="mb-3">
                    <table>
                        <thead>
                            <tr>
                                <th>Intervenant</th>
                                <th>Libellé</th>
                                <th>Nb Heure</th>
                                <th>TH</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $contrat->prestataire['last_name'] . ' ' . $contrat->prestataire['first_name'] }}
                                </td>
                                <td> {{ $contrat->working_description }}</td>
                                <td> {{ $contrat->daily_hourly_rate * 30 }}</td>
                                <td>{{ $contrat->nbreheure }}</td>
                                <!-- <td>{{ \Carbon\Carbon::parse($contrat->date_fin)->format('d/m/Y') }}</td> -->
                                <td>{{ $facture->amount }} F CFA</td>
                            </tr>
                        </tbody>
                    </table>

                    <div style="font-size: 10px; margin: 10px 0 0 0; text-align: end">
                        *Le présent contrat prend effet le
                        {{ \Carbon\Carbon::parse($contrat->date_effet)->format('d/m/Y') }}
                        et prendra fin de plein droit
                        et sans formalité le
                        {{ \Carbon\Carbon::parse($contrat->date_fin)->format('d/m/Y') }}
                    </div>
                </div>


                <div class="text-end justify-content-between align-items-center" style="width: 100%; display: flex">
                    <div style="width: 60%;margin-right: 100px; font-size: 12px">
                        Arreter a la presente somme de
                        <div class="font-700 mt-3"> ........................................................ CFA</div>
                    </div>
                    <div style="width: 40%; flex: none">
                        <div class="d-flex justify-content-between text-uppercase">
                            <div>Prix HT </div>
                            <div class="font-700">0 CFA</div>
                        </div>
                        <div class="d-flex justify-content-between text-uppercase">
                            <div>Prix TVA </div>
                            <div class="font-700">0 CFA</div>
                        </div>
                        <div class="d-flex justify-content-between text-uppercase" style="font-size: 20px">
                            <div>Prix TTC </div>
                            <div class="font-700">0 CFA</div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-5">
                    <div class="mb-5 pb-3 text-uppercase">Le Prestataire</div>
                    <div class="mb-5 pb-3 text-uppercase">Le Client</div>
                </div>
            @break

            {{-- MDP => Mise à disposition de personnel --}}
            @case('MDP')
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <img src="{{ asset('images/logo.jpg') }}" alt="">
                        <div class="font-700 text-uppercase prestater-name">Nearshoring</div>
                        <div class="font-10">356 Rue Aniko Palako, Lomé Togo</div>
                        <div class="font-10">infos@centralressource.com</div>
                    </div>

                    <div class="text-end">
                        <div class="font-700 text-uppercase client-name">Client</div>
                        <div>{{ $contrat->client['last_name'] . ' ' . $contrat->client['first_name'] }}</div>
                        <div>{{ $contrat->client['email'] }}</div>
                        <div>{{ $contrat->client['address'] }}</div>
                    </div>
                </div>

                <div class="text-center text-uppercase">Lomé le,
                    {{ $facture->date_facture }}</div>
                <div class="text-center text-uppercase font-700" style="font-size: 30px">Facture
                    N<sup>O</sup>{{ $facture->id }}</div>

                <div class="mb-3">
                    <table>
                        <thead>
                            <tr>
                                <th>Intervenant</th>
                                <th>Libellé</th>
                                <th>Nb Heure</th>
                                <th>TH</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $contrat->prestataire['last_name'] . ' ' . $contrat->prestataire['first_name'] }}
                                </td>
                                <td> {{ $contrat->working_description }}</td>
                                <td> {{ $contrat->daily_hourly_rate * 30 }}</td>
                                <td>{{ $contrat->nbreheure }}</td>
                                <!-- <td>{{ \Carbon\Carbon::parse($contrat->date_fin)->format('d/m/Y') }}</td> -->
                                <td>{{ $facture->amount }} F CFA</td>
                            </tr>
                        </tbody>
                    </table>

                    <div style="font-size: 10px; margin: 10px 0 0 0; text-align: end">
                        *Le présent contrat prend effet le
                        {{ \Carbon\Carbon::parse($contrat->date_effet)->format('d/m/Y') }}
                        et prendra fin de plein droit
                        et sans formalité le
                        {{ \Carbon\Carbon::parse($contrat->date_fin)->format('d/m/Y') }}
                    </div>
                </div>


                <div class="text-end justify-content-between align-items-center" style="width: 100%; display: flex">
                    <div style="width: 60%;margin-right: 100px; font-size: 12px">
                        Arreter a la presente somme de
                        <div class="font-700 mt-3"> ........................................................ CFA</div>
                    </div>
                    <div style="width: 40%; flex: none">
                        <div class="d-flex justify-content-between text-uppercase">
                            <div>Prix HT </div>
                            <div class="font-700">0 CFA</div>
                        </div>
                        <div class="d-flex justify-content-between text-uppercase">
                            <div>Prix TVA </div>
                            <div class="font-700">0 CFA</div>
                        </div>
                        <div class="d-flex justify-content-between text-uppercase" style="font-size: 20px">
                            <div>Prix TTC </div>
                            <div class="font-700">0 CFA</div>
                        </div>

                        <div class="d-flex justify-content-between text-uppercase">
                            <div>Prix HT </div>
                            <div class="font-700">{{ $contrat->pay_per_hour * $contrat->nbreheure * 30 }} CFA</div>
                        </div>
                        <div class="d-flex justify-content-between text-uppercase">
                            <div>Prix TVA </div>
                            <div class="font-700">{{ $contrat->pay_per_hour * 30 * $contrat->nbreheure }} CFA</div>
                        </div>
                        <div class="d-flex justify-content-between text-uppercase" style="font-size: 17px">
                            <div>Prix TTC </div>
                            <div class="font-700">{{ $contrat->pay_per_hour * 30 * $contrat->nbreheure }} CFA</div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-5">
                    <div class="mb-5 pb-3 text-uppercase">Le Prestataire</div>
                    <div class="mb-5 pb-3 text-uppercase">Le Client</div>
                </div>
            @break
        @endswitch

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                window.print();
            }, 1000)
        })
    </script>
</body>

</html>
