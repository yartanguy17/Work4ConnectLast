<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Contrat;
use App\Models\OffreHistorique;
use App\Models\SignaleAbsence;
use App\Models\User;
use App\Models\Ville;

class ClientController extends Controller
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
        $clients = User::where('type_users', 'client')->get();

        return view('admin.clients.index')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();

        return view('admin.clients.create', compact('villes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
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
        $user->type_users = 'client';
        $user->contact_name = $request->input('contact_name');
        $user->nif = $request->input('nif');
        $user->email = $request->input('email');

        if ($request->input('phone_number')) {
            $user->phone_number = $request->input('phone_number');
        }

        $user->gender = $request->input('gender');
        $user->password = $request->input('password');
        $user->date_creation = $request->input('date_creation');
        $user->ville_id = $request->input('ville_id');
        $user->is_activated = true;

        $checkEmail = User::where('email', '!=', null)
            ->where('email', $user->email)
            ->get(); //Verifier si prestataire existe déjà
        $checkphone = User::where('phone_number', $user->phone_number)->get(); //Verifier si client existe déjà

        if (count($checkEmail) > 0) {

            return back()->with('error', trans('success.emailalre'));
        } elseif (count($checkphone) > 0) {

            return back()->with('error', trans('success.phonealre'));
        } else {

            $user->save();

            return redirect()->route('admin.clients.index')->with('success', trans('success.customeradd'));
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
        $client = User::findOrFail($id);

        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = User::findOrFail($id);
        $villes = Ville::all();

        return view('admin.clients.edit', compact('client', 'villes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, $id)
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
        $user->type_users = 'client';
        $user->contact_name = $request->input('contact_name');
        $user->nif = $request->input('nif');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        if ($request->input('phone_number')) {
            $user->phone_number = $request->input('phone_number');
        }

        $user->gender = $request->input('gender');
        $user->date_creation = $request->input('date_creation');
        $user->ville_id = $request->input('ville_id');
        $user->is_activated = true;

        $checkEmail = User::where('email', '!=', null)
            ->where('email', $user->email)
            ->get(); //Verifier si client existe déjà
        $checkphone = User::where('phone_number', $user->phone_number)->get(); //Verifier si client existe déjà

        if (count($checkEmail) > 1) {

            return back()->with('error', trans('success.emailalre'));
        } elseif (count($checkphone) > 1) {

            return back()->with('error', trans('success.phonealre'));
        } else {

            $user->save();

            return redirect()->route('admin.clients.index')->with('success', trans('success.customerupd'));
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
      
        $check2 = OffreHistorique::where('client_id', $id)->get();

        if (count($check) > 0  || count($check2) > 0) {
            return redirect()->back()->with('error',trans('success.customerimp'));
        } else {

            $user = User::findOrFail($id); //Find a user with a given id and delete
            $user->delete();

            return redirect()->route('admin.clients.index')->with('success', trans('success.customerdel'));
        }
    }
}
