<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use App\Models\Contrat;
use App\Models\DemandeAbsence;
use App\Models\Offer;
use App\Models\Apply;
use App\Models\SignaleAbsence;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
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
    public function index()
    {
        if (Auth::user()->is_activated == false) {

            Auth::logout();

            return redirect()->route('login')->with('error', 'Please, activate your account. Activation link has been sent to your e-mail address');
        } elseif (Auth::user()->type_users == 'client') {

            $contrats = Contrat::where('is_active', 1)
                ->where('date_fin', '>', Carbon::today())
                ->orWhere('date_fin', '=', null)
                ->where('client_id', auth()->user()->id)->count();

            $nbreExpire = Contrat::where('date_fin', '<', \Carbon\Carbon::today())
                ->where('client_id', auth()->user()->id)->count();

            $offers = Offer::where('user_id', auth()->user()->id)->count();

            $nbreAbsence = SignaleAbsence::where('user_id', auth()->user()->id)->where('is_valide', 1)->count(); //Nombre de jours d'absence

            return view('website.clients.dashboard', compact('contrats', 'nbreExpire', 'offers', 'nbreAbsence'));
        } elseif (Auth::user()->type_users == 'prestataire') {

            //$nbreAbsence = DemandeAbsence::where('user_id', auth()->user()->id)->where('is_valide', 1)->count(); //Nombre de jours d'absence

            // $nbreConge = Conge::where('user_id', auth()->user()->id)
            //     ->where('is_valide', 1)->sum('number_day'); //Nombre de jours de congé

            $nbreContratEnCours = Contrat::where('is_active', 1)
                ->where('date_fin', '>', Carbon::today())
                ->where('prestataire_id', auth()->user()->id)->count(); //Nombre de contrat en cours

            $nbreContratExpire = Contrat::where('date_fin', '<', \Carbon\Carbon::today())
                ->where('prestataire_id', auth()->user()->id)->count(); //Nombre de contrat expiré
                
                $nbreCandidatures = Apply::where('user_id',auth()->user()->id)->count(); //Nombre de contrat expiré

            return view('website.prestataires.dashboard', compact('nbreContratEnCours', 'nbreContratExpire','nbreCandidatures'));
        } else {

            Auth::logout();
            Session::invalidate();
            Session::regenerateToken();

            return redirect()->route('admin.login')->with('error', trans('success.loghere'));
        }
    }
}
