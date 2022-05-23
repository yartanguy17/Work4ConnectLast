<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrestataireRequest;
use App\Http\Requests\UpdatePrestataireRequest;
use App\Models\Apply;
use App\Models\Conge;
use App\Models\Contrat;
use App\Models\DemandeAbsence;
use App\Models\SecteurActivite;
use App\Models\User;
use App\Models\Ville;

class PrestataireController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestataires = User::where('type_users', 'prestataire')->get();

        return view('admin.prestataires.index')->with('prestataires', $prestataires);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secteurs = SecteurActivite::all();
        $villes = Ville::all();

        return view('admin.prestataires.create', compact('secteurs', 'villes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PrestataireRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrestataireRequest $request)
    {
        if ($request->hasfile('profile_picture')) {

            $fileUrl = $request->file('profile_picture');
            $fileNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
            $destinationPath = public_path('/profil');
            $fileUrl->move($destinationPath, $fileNameToStore); //Ajouter photo
        }

        $user = new User();
        $user->personne_type = $request->input('personne_type');
        $user->last_name = $request->input('last_name');
        $user->first_name = $request->input('first_name');
        $user->type_users = 'prestataire';
        $user->contact_name = $request->input('contact_name');
        $user->nif = $request->input('nif');
        $user->num_impot = $request->input('num_impot');
        $user->secteur_activite_id = $request->input('secteur_activite_id');
        $user->autre = $request->input('secteur_activite');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        $user->password = $request->input('password');
        $user->ville_id = $request->input('ville_id');
        $user->is_activated = true;
        $user->date_creation = $request->input('date_creation');

        if ($request->input('phone_number')) {
            $user->phone_number = $request->input('phone_number');
        }

        if ($request->hasfile('profile_picture')) {
            $user->profile_picture = $fileNameToStore;
        }

        $checkEmail = User::where('email', '!=', null)
            ->where('email', $user->email)
            ->get(); //Verifier si prestataire existe déjà
        $checkphone = User::where('phone_number', $user->phone_number)->get(); //Verifier si client existe déjà

        if (count($checkEmail) > 0) {

            return back()->with('error', trans('success.emailalre'));
        }
        // elseif ($request->input('email')== null) {

        //     return  back()->with('error', "Le Numéro de téléphone $user->phone_number existe déjà");
        // }
        elseif (count($checkphone) > 0) {

            return back()->with('error', trans('success.phonealre'));
        } else {

            $user->save();

            return redirect()->route('admin.prestataires.index')->with('success', trans('success.jobseekeradd'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prestataire = User::findOrFail($id); //Find a prestataire with a given id and delete

        return view('admin.prestataires.show', compact('prestataire'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prestataire = User::findOrFail($id); //Find a prestataire with a given id and delete
        $secteurs = SecteurActivite::all();
        $villes = Ville::all();

        return view('admin.prestataires.edit', compact('prestataire', 'secteurs', 'villes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdatePrestataireRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrestataireRequest $request, $id)
    {
        if ($request->hasfile('profile_picture')) {

            $fileUrl = $request->file('profile_picture');
            $fileNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
            $destinationPath = public_path('/profil');
            $fileUrl->move($destinationPath, $fileNameToStore); //Ajouter photo
        }

        $user = User::findOrFail($id);
        $user->personne_type = $request->input('personne_type');
        $user->last_name = $request->input('last_name');
        $user->first_name = $request->input('first_name');
        $user->type_users = 'prestataire';
        $user->contact_name = $request->input('contact_name');
        $user->nif = $request->input('nif');
        $user->num_impot = $request->input('num_impot');
        $user->secteur_activite_id = $request->input('secteur_activite_id');
        $user->autre = $request->input('secteur_activite');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        if ($request->input('phone_number')) {
            $user->phone_number = $request->input('phone_number');
        }

        $user->date_creation = $request->input('date_creation');

        if ($request->hasfile('profile_picture')) {
            $user->profile_picture = $fileNameToStore;
        }

        $user->gender = $request->input('gender');
        $user->ville_id = $request->input('ville_id');
        $user->is_activated = true;

        $checkEmail = User::where('email', $user->email)->get(); //Verifier si prestataire existe déjà
        $checkphone = User::where('phone_number', $user->phone_number)->get(); //Verifier si client existe déjà

        if (count($checkEmail) > 1) {

            return back()->with('error', trans('success.emailalre'));
        } elseif (count($checkphone) > 1) {

            return back()->with('error', trans('success.phonealre'));
        } else {

            $user->save();

            return redirect()->route('admin.prestataires.index')->with('success', trans('success.jobseekerupd'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = Contrat::where('prestataire_id', $id)->get();
        $check1 = Apply::where('user_id', $id)->get();
        $check2 = DemandeAbsence::where('user_id', $id)->get();
        $check3 = Conge::where('user_id', $id)->get();

        if (count($check) > 0 || count($check1) > 0 || count($check2) > 0 || count($check3) > 0) {

            return redirect()->back()->with('error', trans('success.jobseekerdel'));
        } else {

            $user = User::findOrFail($id); //Find a prestataire with a given id and delete
            $user->delete();

            return redirect()->route('admin.prestataires.index')->with('success', trans('success.jobseekerdelet'));
        }
    }
}
