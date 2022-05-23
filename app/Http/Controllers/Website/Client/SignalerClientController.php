<?php

namespace App\Http\Controllers\Website\Client;

use App\Models\TypeAbsence;
use App\Models\SignaleAbsence;
use App\Models\Contrat;
use App\Models\Historique;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSignalerClientRequest;
use App\Http\Requests\UpdateSignalerClientRequest;

class SignalerClientController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $signalerabsences = SignaleAbsence::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();

        return view('website.clients.signalerabsences.index', compact('signalerabsences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contrats = Contrat::where('is_active', 1)->where('client_id', auth()->user()->id)->get();
        $typeabsences = TypeAbsence::all(); // Get all type absence

        return view('website.clients.signalerabsences.create', compact('contrats', 'typeabsences'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreSignalerClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSignalerClientRequest $request)
    {
        $signalerabsences = new SignaleAbsence();
        $signalerabsences->type_absence_id = $request->input('type_absence_id');
        $signalerabsences->date_demande = $request->input('date_demande');
        $signalerabsences->hour_start_time = $request->input('hour_start_time');
        $signalerabsences->date_reprise = $request->input('date_reprise');
        $signalerabsences->motif_demande = $request->input('motif_demande');
        $signalerabsences->contrat_id = $request->input('contrat_id');
        $signalerabsences->user_id = auth()->user()->id;

        $historicals = new Historique(); //Create Historique
        $historicals->historical_name = 'Vous venez de signaler une absence';
        $historicals->user_id = auth()->user()->id;

        //check if date between two dates
        $startDate = date('Y-m-d', strtotime($request->input('date_demande')));
        $endDate = date('Y-m-d', strtotime($request->input('date_reprise')));

        if ($startDate >= $endDate) {

            return back()->with('error', "La date de reprise de poste ne peut être inférieure  à la date début d'absence");
        } else {

            $signalerabsences->save(); //insert in database
            $historicals->save(); //insert in database

            return redirect()->route('client.signalerabsences.index')->with('success', 'Absence ajoutée avec succès.'); //return
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
        $signalerabsences = SignaleAbsence::findOrFail($id); //Get offer specified by id

        return view('website.clients.signalerabsences.show', compact('signalerabsences'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contrats = Contrat::where('is_active', 1)->get();
        $typeabsences = TypeAbsence::all(); // Get all type absence
        $signalerabsences = SignaleAbsence::findOrFail($id); //

        return view('website.clients.signalerabsences.edit', compact('contrats', 'typeabsences', 'signalerabsences'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateSignalerClientRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSignalerClientRequest $request, $id)
    {
        $signalerabsences = SignaleAbsence::findOrFail($id);
        $signalerabsences->type_absence_id = $request->input('type_absence_id');
        $signalerabsences->date_demande = $request->input('date_demande');
        $signalerabsences->hour_start_time = $request->input('hour_start_time');
        $signalerabsences->date_reprise = $request->input('date_reprise');
        $signalerabsences->motif_demande = $request->input('motif_demande');
        $signalerabsences->contrat_id = $request->input('contrat_id');

        $historicals = new Historique(); //Create historique
        $historicals->historical_name = 'Vous venez de faire modifié une absence';
        $historicals->user_id = auth()->user()->id;

        //check if date between two dates
        $startDate = date('Y-m-d', strtotime($request->input('date_demande')));
        $endDate = date('Y-m-d', strtotime($request->input('date_reprise')));

        if ($startDate >= $endDate) {

            return back()->with('error', "La date de reprise de poste ne peut être inférieure  à la date début d'absence");
        } else {

            $signalerabsences->save();
            $historicals->save(); //insert in database

            return redirect()->route('client.signalerabsences.index')->with('success', 'Absence mis à jour avec succès.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletesignalerabsences($id)
    {
        $signalerabsences = SignaleAbsence::find($id);
        $signalerabsences->delete(); //function in delete

        $message = 'Absence ' . $signalerabsences->motif_demande . ' supprimée avec succès.';

        return response()->json(['success' => true, 'message' => $message]);
    }
}
