<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contrat;
use App\Models\Facture;

class JobsController extends Controller
{
    public function generateAutomatedInvoice()
    {
        $contrats = Contrat::where('status', true)->get();

        foreach ($contrats as $contrat) {

            // recup contrat egal a 30
            try {
                if ($contrat->compteur == 29) {

                    $contrat->compteur = 0;
                    // generation de la facture

                    $facture = new Facture();

                    $payByHuer = $contrat->pay_per_hour;

                    $amount = (int) $payByHuer * 30;

                    $facture->contrat_id = $contrat->id;
                    $facture->amount = $amount;
                    $facture->reference = rand(1000, 9999);
                    $facture->date_facture = date('Y-m-d');

                    $facture->save();
                    $contrat->save();

                } else {
                    $contrat->compteur += 1;
                    $contrat->save();
                }
            } catch (\Exception $ignore) {

            }

        }
    }
}
