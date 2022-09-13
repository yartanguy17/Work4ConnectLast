<?php

namespace App\Http\Controllers\Website\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientConfirmTelRequest;
use App\Http\Requests\ClientPasswordRequest;
use App\Http\Requests\ClientProfilRequest;
use App\Mail\ReservationAdminMail;
use App\Models\Conge;
use App\Models\Contrat;
use App\Models\DemandeAbsence;
use App\Models\Facture;
use App\Models\Reservation;
use App\Models\SecteurActivite;
use App\Models\User;
use App\Models\Ville;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function changePassword()
    {
        return view('website.clients.change_password');
    }

    public function liste()
    {
        $absences = DemandeAbsence::where('contrats.client_id', auth()->user()->id)
            ->join('contrats', 'contrats.id', '=', 'demande_absences.contrat_id')
            ->join('users', 'users.id', '=', 'demande_absences.user_id')
            ->where('is_valide', false)
            ->where('is_valide_client', false)
            ->orderBy('demande_absences.created_at', 'desc')->get();

        return view('website.clients.demandes.valider_absence', compact('absences'));
    }

    public function valider($id)
    {
        $absences = DemandeAbsence::find(decrypt($id));
        $absences->is_valide_client = true;
        $absences->save();

        return back()->with('info', trans('success.demandevali'));
    }

    public function reffuser($id)
    {
        $absences = DemandeAbsence::find(decrypt($id));
        $absences->is_valide_client = false;
        $absences->save();

        return back()->with("info", trans('success.demanderef'));
    }

    public function listeconges()
    {
        $conges = Conge::where('contrats.client_id', auth()->user()->id)
            ->join('contrats', 'contrats.id', '=', 'conges.contrat_id')
            ->join('users', 'users.id', '=', 'conges.user_id')
            ->where('is_valide', false)
            ->where('is_valide_client', false)
            ->orderBy('conges.created_at', 'desc')->get();

        return view('website.clients.demandes.valider_conge', compact('conges'));
    }

    public function validerconge($id)
    {
        $conges = Conge::find(decrypt($id));
        $conges->is_valide_client = true;
        $conges->save();

        return back()->with('info', trans('success.demandecong'));
    }

    public function reffuserconge($id)
    {
        $conges = Conge::find(decrypt($id));
        $conges->is_valide_client = false;
        $conges->save();
        return back()->with("info", trans('success.demanderef'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function setting()
    {
        $client = User::where('users.id', auth()->user()->id)->first();
       

        return view('website.clients.profile_setting', compact('client'));
    }

    public function reservation($id)
    {

        $reservations = Reservation::where('prestataire_id', $id)->where('is_active', 1)->get();

        if ($reservations->isNotEmpty()) {

            return redirect()->back()->with('info', trans('success.reservatres'));
        } else {

            $reservation = new Reservation();
            $reservation->user_id = auth()->user()->id;
            $reservation->prestataire_id = $id;
            $reservation->reservation_date = Carbon::today();
            $reservation->is_active = 1;

            $reservation->save();

            Mail::to('noreply@centralresource.net')->send(new ReservationAdminMail($reservation));

            return redirect()->route('client.confirm_tel')->with('success', trans('success.demandecompte'));
        }
    }

    public function updatePassword(ClientPasswordRequest $request)
    {
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id); //Get user specified by id

        if ((Hash::check(request('old_password'), Auth::user()->password)) == false) {

            return back()->with('error', trans('success.passwdold'));
        } else if ((Hash::check(request('new_password'), Auth::user()->password)) == true) {

            return back()->with('error', trans('success.passwdnew'));
        } else {

            $user->password = $request->input('new_password');
            $user->save();

            return redirect('dashboard')->with('message', trans('success.passwrd'));
        }
    }

    public function postSetting(ClientProfilRequest $request)
    {
        if ($request->hasfile('profile_picture')) {
            $fileUrl = $request->file('profile_picture');
            $fileNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
            $destinationPath = public_path('/profil');
            $fileUrl->move($destinationPath, $fileNameToStore); //Ajouter photo
        }

        $client = User::findOrFail(auth()->user()->id);
        $client->last_name = $request->input('last_name');
        $client->first_name = $request->input('first_name');
        $client->contact_name = $request->input('contact_name');
        $client->nif = $request->input('nif');
        $client->gender = $request->input('gender');
        $client->city = $request->input('city');
         $client->country = $request->input('country');
        $client->email = $request->input('email');
         $client->birth_date = $request->input('birth_date');
        $client->date_creation = $request->input('date_creation');
        $client->address = $request->input('address');
        $client->activity = $request->input('activity');
        $client->market = $request->input('market');
        $client->tax_id_in_country = $request->input('tax_id');
        $client->url_comp = $request->input('url_comp');

        if ($request->input('phone_number')) {
            $client->phone_number = $request->input('phone_number');
        }

       

        if ($request->hasfile('profile_picture')) {
            $client->profile_picture = $fileNameToStore;
        }

        $client->biography = $request->input('biography');

        $client->save();

        return redirect()->back()->with('success', trans('success.profile'));
    }

    public function take(Request $request, $id)
    {
        $reservations = Reservation::where('user_id', auth()->user()->id)->where('is_active', 1)->get();

        if ($reservations->isNotEmpty()) {

            return redirect()->back()->with('error', trans('success.reservatres'));
        } else {

            $reservation = new Reservation();
            $secteur = SecteurActivite::findOrFail($request->secteur_activite_id);
            $reservation->user_id = auth()->user()->id;
            $reservation->secteur_activite_id = $request->input('secteur_activite_id');
            $reservation->reservation_date = Carbon::today();
            $reservation->is_active = 1;

            $reservation->save();

            Mail::to('noreply@centralresource.net')->send(new ReservationAdminMail($reservation));

            return redirect()->route('client.confirm_tel')->with('success', trans('success.demancompte'));
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function confirmTel()
    {
        return view('website.clients.confirm_tel');
    }

    public function postConfirmTel(ClientConfirmTelRequest $request)
    {
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id); //Get user specified by id

        if ($user->phone_number == $request->input('phone_number')) {

            return back()->with('success', trans('success.confirtel'));
        } else {

            $user->phone_number = $request->input('phone_number');
            $user->save();

            return redirect()->route('dashboard')->with('success', trans('success.resprest'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pendingContrat()
    {
        $contrats = Contrat::where('is_active', 1)
            ->where('date_fin', '>', Carbon::today())
            ->orWhere('date_fin', '=', null)
            ->where('client_id', auth()->user()->id)->get();

        return view('website.clients.contrats.index', compact('contrats'));
    }

    public function factureContrat()
    {
        $factures = Facture::where('contrats.is_active', 1)->where('contrats.client_id', auth()->user()->id)
            ->where('factures.status', 0)
            ->join('contrats', 'contrats.id', '=', 'factures.contrat_id')
            ->get();

        return view('website.clients.contrats.factures', compact('factures'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archivedContrat()
    {
        $contrats = Contrat::where('date_fin', '<', \Carbon\Carbon::today())->where('client_id', auth()->user()->id)->get();

        return view('website.clients.contrats.archived')->with('contrats', $contrats);
    }

    public function pdf($id)
    {

        $contrat = Contrat::findOrFail($id);
        $date = Carbon::now();

        $data = [
            'contrat' => $contrat,
            'date' => $date,
        ];

        $pdf = PDF::loadView('website.clients.contrats.pdf', $data);

        return $pdf->stream('Contrat' . $date . '.pdf');
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

            $result = curl_exec($ch);
            if (curl_errno($ch) !== 0) {
                error_log('cURL error when connecting to ' . $url . ': ' . curl_error($ch));
            }

            curl_close($ch);
            if ($result == null || $result == '{"error_code":403,"error_message":"Transaction non trouvée."}') {
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
    }
}
