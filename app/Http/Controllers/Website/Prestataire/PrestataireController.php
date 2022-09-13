<?php

namespace App\Http\Controllers\Website\Prestataire;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrestatairePasswordRequest;
use App\Http\Requests\PrestataireProfilRequest;
use App\Models\Contrat;
use App\Models\DemandeFormation;
use App\Models\Formation;
use App\Models\User;
use App\Models\Ville;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PrestataireController extends Controller
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
        return view('website.prestataires.change_password');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function setting()
    {
        $prestataire = User::where('users.id', auth()->user()->id)->first();
        

        return view('website.prestataires.profile_setting', compact('prestataire'));
    }

    public function updatePassword(PrestatairePasswordRequest $request)
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

            return redirect()->route('dashboard')->with('success', trans('success.passwrd'));
        }
    }

    public function postSetting(PrestataireProfilRequest $request)
    {
        if ($request->hasfile('profile_picture')) {

            $fileUrl = $request->file('profile_picture');
            $fileNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
            $destinationPath = public_path('/profil');
            $fileUrl->move($destinationPath, $fileNameToStore);
        }

        // CNI saved
        if ($request->hasfile('cni_file')) {

            $fileUrl = $request->file('cni_file');
            $cniNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
            $destinationPath = public_path('/attachments');
            $fileUrl->move($destinationPath, $cniNameToStore);
        }

        // Passport saved
        if ($request->hasfile('passport_file')) {

            $fileUrl = $request->file('passport_file');
            $passportNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
            $destinationPath = public_path('/attachments');
            $fileUrl->move($destinationPath, $passportNameToStore);
        }

        // CNI saved
        if ($request->hasfile('vote_card_file')) {

            $fileUrl = $request->file('vote_card_file');
            $vote_cardNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
            $destinationPath = public_path('/attachments');
            $fileUrl->move($destinationPath, $vote_cardNameToStore);
        }

        $prestataire = User::findOrFail(auth()->user()->id);
        $prestataire->last_name = $request->input('last_name');
        $prestataire->first_name = $request->input('first_name');
        $prestataire->contact_name = $request->input('contact_name');
        $prestataire->nif = $request->input('nif');
        $prestataire->gender = $request->input('gender');
        $prestataire->email = $request->input('email');
          $prestataire->biography = $request->input('biography');
        $prestataire->birth_date = $request->input('birth_date');
        $prestataire->date_creation = $request->input('date_creation');

        if ($request->input('phone_number')) {
            $prestataire->phone_number = $request->input('phone_number');
        }

       
        if ($request->hasfile('profile_picture')) {
            $prestataire->profile_picture = $fileNameToStore;
        }

        if ($request->hasfile('cni_file')) {
            $prestataire->cni_num = $request->input('cni_num');
            $prestataire->cni_file = $cniNameToStore;
        }

        if ($request->hasfile('passport_file')) {
            $prestataire->passport_num = $request->input('passport_num');
            $prestataire->passport_file = $passportNameToStore;
        }

        if ($request->hasfile('vote_card_file')) {
            $prestataire->voter_card_num = $request->input('voter_card_num');
            $prestataire->voter_card_file = $vote_cardNameToStore;
        }

        $prestataire->num_impot = $request->input('num_impot');
        $prestataire->address = $request->input('address');
        $prestataire->expected_salary = $request->input('expected_salary');
        $prestataire->total_experience = $request->input('total_experience');

        $prestataire->save();

        return redirect()->back()->with('success', trans('success.profile'));
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
            ->where('prestataire_id', auth()->user()->id)
            ->get();

        return view('website.prestataires.contrats.index')->with('contrats', $contrats);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archivedContrat()
    {
        $contrats = Contrat::where('date_fin', '<', \Carbon\Carbon::today())->where('prestataire_id', auth()->user()->id)->get();

        return view('website.prestataires.contrats.archived')->with('contrats', $contrats);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pendingFormation()
    {
        $participations = DemandeFormation::join('formations', 'formations.id', '=', 'demande_formations.formation_id')
            ->where('demande_formations.status', 1)
            ->where('demande_formations.user_id', auth()->user()->id)
            ->where('date_debut', '>', Carbon::now())
            ->get();

        return view('website.prestataires.formations.index')->with('participations', $participations);
    }

    public function pendingFormationBiginning()
    {
        $participations = DemandeFormation::join('formations', 'formations.id', '=', 'demande_formations.formation_id')
            ->where('demande_formations.status', 1)
            ->where('user_id', auth()->user()->id)
            ->where('date_debut', '<=', Carbon::now())
            ->get();

        //  dd($participations);

        return view('website.prestataires.formations.index')->with('participations', $participations);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archivedFormation()
    {
        // $participations = DemandeFormation::where('created_at', '<', \Carbon\Carbon::today())->where('user_id', auth()->user()->id)->get();
        $participations = DemandeFormation::join('formations', 'formations.id', '=', 'demande_formations.formation_id')
            ->where('demande_formations.status', 1)
            ->where('demande_formations.user_id', auth()->user()->id)
            ->where('date_fin', '<', Carbon::now())
            ->get();

        return view('website.prestataires.formations.archived')->with('participations', $participations);
    }

    public function formation_view($id)
    {
        $participant = DemandeFormation::findOrFail($id);
        $formation = Formation::findOrFail($participant->formation_id);

        return view('website.prestataires.formations.show', compact('participant', 'formation'));
    }
}
