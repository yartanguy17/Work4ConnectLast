<?php

namespace App\Http\Controllers\Admin;

ini_set('max_execution_time', 300); //300 seconds = 5 minutes

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrimeRequest;
use App\Models\Contrat;
use App\Models\Facture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PayeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    public function paie($id)
    {
        $facture = Facture::findOrFail($id);

        $facture->reference = random_int(1000, 99999);
        $facture->save();

        $montant = $facture->amount;
        $token = "da1b9b58-67cc-486c-9c71-e0608d55cdcc";
        $identifier = $facture->reference;
        $description = "Paiement de facture";
        $callback = route('callback', ['identifier' => $identifier]);
        $url = "https://paygateglobal.com/v1/page?token=$token&amount=$montant&description=$description&identifier=$identifier&url=$callback";
        return Redirect::to($url);
    }

    public function checkPayment(Request $request)
    {
        $facture = Facture::where('reference', $request->identifier)->get()->first();

        if ($facture) {
            //The URL that we want to send a PUT request to.
            $url = 'https://paygateglobal.com/api/v2/status';
            $params = array(
                'auth_token' => 'da1b9b58-67cc-486c-9c71-e0608d55cdcc',
                'identifier' => $request->identifier,
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
            curl_setopt($ch, CURLOPT_TIMEOUT, 60);

            // This should be the default Content-type for POST requests
            //curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded"));

            $result = curl_exec($ch);
            if (curl_errno($ch) !== 0) {
                error_log('cURL error when connecting to ' . $url . ': ' . curl_error($ch));
            }

            curl_close($ch);
            if ($result == null || $result == '{"error_code":403,"error_message":trans("success.transnotfound")}') {
                // return -1;
                $facture->status = false;
            } else {
                $manage = json_decode($result, true);
                if ($manage["status"] == 0) {
                    $facture->status = true;
                }

            }

            $facture->save();
        }

        return redirect()->to(route('affiche'));
    }

    public function callback()
    {
        $facture = Facture::findOrFail(3);
        $identifier = $facture->reference;
        $token = "da1b9b58-67cc-486c-9c71-e0608d55cdcc";
        $url = "https://paygateglobal.com/api/v1/status?token=$token&identifier=$identifier";

        return Redirect::to($url);

        //dd($url);
    }

    public function allPrestataires(Request $request)
    {
        // check if ajax request is coming or not
        if ($request->ajax()) {
            $query = $request->get('prestataire');
            // select country name from database
            $data = DB::table('users')
                ->where('type_users', '=', 'prestataire')
                ->where('last_name', 'like', $query . '%')
                ->orWhere('first_name', 'like', $query . '%')
                ->get();
            // declare an empty array for output
            $output = '';
            // if searched countries count is larager than zero
            if (count($data) > 0) {
                // concatenate output to the array
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                // loop through the result array
                foreach ($data as $row) {
                    // concatenate output to the array
                    $output .= '<li class="list-group-item prestataire_li" data-id="' . $row->id . '">' . $row->last_name . ' ' . $row->first_name . '</li>';
                }
                // end of output
                $output .= '</ul>';
            } else {
                // if there's no matching results according to the input
                $output .= '<li class="list-group-item li-prestataire_li">' . 'No jobseeker found' . '</li>';
            }
            // return output result array
            return $output;
        }
    }
}
